<?php
// DB接続情報
$dsn = 'mysql:dbname=strs20250818_app;host=localhost;charset=utf8mb4';
$user = 'strs20250818_pa';
$password = 'pass.star01';

// updateパラメータの値が存在するとき（「更新」ボタンを押したとき）の処理
if (isset($_POST['update'])) {
  try {
    // DB接続
    $pdo = new PDO($dsn, $user, $password);

    // 動的に変わる値をプレースホルダに置き換えたUPDATE文をあらかじめ用意する
    $sql_update =
      'UPDATE books 
    SET book_code = :book_code, 
    book_name = :book_name, 
    price = :price, 
    stock_quantity = :stock_quantity, 
    genre_code = :genre_code 
    WHERE id = :id';

    // SQL文を用意する
    // 補足：prepare()メソッドはSQL文を実行するための準備をするメソッドで、SQL文を実行するわけではない
    $stmt_update = $pdo->prepare($sql_update);

    // bindValue()メソッドを使って実際の値をプレースホルダにバインドする（割り当てる）
    $stmt_update->bindValue(':book_code', $_POST['book_code'], PDO::PARAM_INT);
    $stmt_update->bindValue(':book_name', $_POST['book_name'], PDO::PARAM_STR);
    $stmt_update->bindValue(':price', $_POST['price'], PDO::PARAM_INT);
    $stmt_update->bindValue(':stock_quantity', $_POST['stock_quantity'], PDO::PARAM_INT);
    $stmt_update->bindValue(':genre_code', $_POST['genre_code'], PDO::PARAM_STR);
    $stmt_update->bindValue(':id', $_GET['id'], PDO::PARAM_INT);

    // SQL文を実行する
    $stmt_update->execute();

    // 更新した件数を取得する
    $count = $stmt_update->rowCount();

    // 更新完了メッセージを作成する
    $message = "商品を{$count}件更新しました。";

    // 更新完了メッセージを表示して商品一覧ページにリダイレクトさせる（同時にmessageパラメータも渡す）
    header("Location: book_list.php?message={$message}");
  } catch (PDOException $e) {
    exit($e->getMessage());
  }
}
// セレクトボックスの選択肢を設定する
try {
  $pdo = new PDO($dsn, $user, $password);

  // genresテーブルからgenre_codeカラムのデータを取得するためのSQL文を変数$sql_selectに代入する
  $sql_select = 'SELECT genre_code FROM genres';

  // SQL文を用意する
  $stmt_select = $pdo->query($sql_select);

  // SQL文の実行結果を配列で取得する
  // 補足：PDO::FETCH_COLUMNは1つのカラムの値を1次元配列（多次元ではない普通の配列）で取得する
  $genre_codes = $stmt_select->fetchAll(PDO::FETCH_COLUMN);
} catch (PDOException $e) {
  exit($e->getMessage());
}


// 更新前のデータを入力欄の初期値に設定する
if (isset($_GET['id'])) {
  // DB接続
  try {
    $pdo = new PDO($dsn, $user, $password);

    // SQL文を用意する
    $sql_select = 'SELECT * FROM books WHERE id = :id';
    $stmt_select = $pdo->prepare($sql_select);
    $stmt_select->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
    $stmt_select->execute();

    // SQL文の実行結果を配列で取得する
    $book = $stmt_select->fetch(PDO::FETCH_ASSOC);

    // 取得したデータが存在しない場合はエラーメッセージを表示する
    if ($book === false) {
      exit('idパラメータの値が不正です。');
    }
  } catch (PDOException $e) {
    exit($e->getMessage());
  }
} else {
  exit('idパラメータの値が存在しません。');
}
?>

<?php include __DIR__ . '/header.php'; ?>
<main class="l-main">
  <article class="l-article p-article--narrow">
    <h1>商品編集</h1>
    <div class="p-book-create__back">
      <a href="book_list.php" class="c-btn">&lt; 戻る</a>
    </div>
    <form action="book_update.php?id=<?= $_GET['id'] ?>" method="post" class="p-book-create__form">
      <div>
        <label for="book_code">品番</label>
        <input type="number" name="book_code" id="book_code" value="<?= $book['book_code'] ?>" min="0" required>

        <label for="book_name">商品名</label>
        <input type="text" name="book_name" id="book_name" value="<?= $book['book_name'] ?>" required>

        <label for="price">単価</label>
        <input type="number" name="price" id="price" value="<?= $book['price'] ?>" min="0" required>

        <label for="stock_quantity">在庫数</label>
        <input type="number" name="stock_quantity" id="stock_quantity" value="<?= $book['stock_quantity'] ?>" min="0" required>

        <label for="genre_code">ジャンルコード</label>
        <select name="genre_code" id="genre_code" required>
          <option value="" disabled selected>選択してください</option>
          <?php
          // 配列の中身をforeach文で順番に取り出し、セレクトボックスの選択肢として出力する
          foreach ($genre_codes as $genre_code) {
            // 取得したデータが選択肢の値と一致する場合は、selected属性を付与する
            if ($book['genre_code'] === $genre_code) {
              echo "<option value='{$genre_code}' selected>{$genre_code}</option>";
            } else {
              echo "<option value='{$genre_code}'>{$genre_code}</option>";
            }
          }
          ?>
        </select>
      </div>
      <button type="submit" class="c-btn c-btn--submit" name="update" value="update">更新</button>
    </form>
  </article>
</main>

</body>

</html>