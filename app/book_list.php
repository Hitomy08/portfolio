<?php
// DB接続情報
$dsn = 'mysql:dbname=strs20250818_app;host=localhost;charset=utf8mb4';
$user = 'strs20250818_pa';
$password = 'pass.star01';

// DB接続
try {
  $pdo = new PDO($dsn, $user, $password);

  // 並び替えパラメータがあるかチェックして、$orderに代入する
  if (isset($_GET['order'])) {
    $order = $_GET['order'];
  } else {
    $order = null;
  }


  // 検索パラメータがあるかチェックして、$keywordに代入する
  if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
  } else {
    $keyword = null;
  }

  // SQL文の作成
  if ($order === 'desc') {
    // $orderが降順の場合
    $sql_select = 'SELECT * FROM books WHERE book_name LIKE :keyword ORDER BY updated_at DESC';
  } else {
    // $orderが昇順の場合
    $sql_select = 'SELECT * FROM books WHERE book_name LIKE :keyword ORDER BY updated_at ASC';
  }
  // SQL文を用意する
  $stmt_select = $pdo->prepare($sql_select);

  // SQLのLIKE句で使うため、変数$keyword（検索ワード）の前後を%で囲む（部分一致）
  $partial_match = "%{$keyword}%";

  // bindValue()メソッドを使って実際の値をプレースホルダにバインドする（割り当てる）
  $stmt_select->bindValue(':keyword', $partial_match, PDO::PARAM_STR);


  // SQL文を実行する
  $stmt_select->execute();

  // SQL文の実行結果を配列で取得する
  $books = $stmt_select->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  exit($e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>データ編集・CRUD操作機能</title>
  <link rel="stylesheet" href="css/foundation.css">
  <link rel="stylesheet" href="css/layout.css">
  <link rel="stylesheet" href="css/component.css">
  <link rel="stylesheet" href="css/project.css">
  <!--Google Fontsの読み込み-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
</head>

<body>
  <!--  
  <header class="l-header">
    <nav class="l-header__nav">
      <a href="index.php">データ管理アプリ</a>
    </nav>
  </header>
  -->
  <main class="l-main">
    <article class="l-article">
      <h1>データ編集・CRUD操作機能</h1>
      <div class="c-message">データの登録・更新・削除（CRUD）操作ができます。</div>

      <?php
      // （商品の登録・編集・削除後）messageパラメータの値を受け取っていれば、それを表示する
      if (isset($_GET['message'])) {

        echo "<p class='c-message--create'>{$_GET['message']}</p>";
      }
      ?>

      <!-- 並び替えボタン -->
      <div class="c-header">
        <div class="c-controls">
          <!-- 昇順（古い順） -->
          <a href="book_list.php?order=asc&keyword=<?= $keyword ?>"><img src="images/asc.png" alt="昇順" class="c-sort-icon"></a>
          <!-- 降順（新しい順） -->
          <a href="book_list.php?order=desc&keyword=<?= $keyword ?>"><img src="images/desc.png" alt="降順" class="c-sort-icon"></a>

          <!-- 検索欄 -->
          <form action="book_list.php" method="get" class="c-search-form">
            <div class="c-search-form__input-wrapper">
              <input type="hidden" name="order" value="<?= $order ?>">
              <input type="text" name="keyword" value="<?= $keyword ?>" placeholder="商品名で検索" class="c-search-form__input" id="searchInput">
              <span id="clearButton" class="c-search-form__clear-btn" style="display: none;">✖</span>
            </div>

          </form>
        </div>
        <a href="book_create.php" class="c-btn">商品登録</a>
      </div>
      <!-- 商品一覧テーブル -->
      <div class="c-table-wrapper">
        <table class="p-book-list__table">
          <thead>
            <tr>
              <th>品番</th>
              <th>商品名</th>
              <th>単価</th>
              <th>在庫数</th>
              <th>ジャンルコード</th>
              <th>編集</th>
              <th>削除</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($books as $book) {
              $table_row = "
               <tr>
                <td>{$book['book_code']}</td>
                <td>{$book['book_name']}</td>
                <td>{$book['price']}</td>
                <td>{$book['stock_quantity']}</td>
                <td>{$book['genre_code']}</td>
                <td><a href='book_update.php?id={$book['id']}'><img src='images/edit.png' alt='編集' class='c-edit-icon'></a></td>
                <td><a href='book_delete.php?id={$book['id']}'><img src='images/delete.png' alt='削除' class='c-delete-icon'></a></td>
              </tr>
            ";
              echo $table_row;
            }
            ?>
          </tbody>
        </table>
      </div>


    </article>
  </main>

  <!-- フッター -->
  <footer class="l-footer">
    <!-- <p class="l-footer__copyright">&copy; CRUD・データ編集機能 All rights reserved.</p> -->
    <a href="https://ebinahitomi.com/#demos" class="l-footer-link">前のページに戻る</a>
  </footer>
  <!-- /footer -->

</body>

</html>