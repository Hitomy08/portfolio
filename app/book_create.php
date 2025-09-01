<?php
// DB接続情報
$dsn = 'mysql:dbname=strs20250818_app;host=localhost;charset=utf8mb4';
$user = 'strs20250818_pa';
$password = 'pass.star01';

// genre_codeのセレクトボックスを設定する
try {
  $pdo = new PDO($dsn, $user, $password);

  // genresテーブルからgenre_codeカラムのデータを取得するためのSQL文を変数に代入する
  $sql_select_genre_codes = 'SELECT genre_code FROM genres';

  // SQL文を実行する
  $stmt_select_genre_codes = $pdo->query($sql_select_genre_codes);

  // SQL文の実行結果を配列で取得する
  // PDO::FETCH_COLUMNは1つのカラムの値を1次元配列で取得する
  $genre_codes = $stmt_select_genre_codes->fetchAll(PDO::FETCH_COLUMN);
} catch (PDOException $e) {
  exit($e->getMessage());
}

// submitパラメータの値が存在するとき（「登録」ボタンを押したとき）の処理
if (isset($_POST['submit'])) {
  try {
    // DB接続
    $pdo = new PDO($dsn, $user, $password);

    // 動的に変わる値をプレースホルダに置き換えたINSERT文をあらかじめ用意する
    $sql_insert =
      'INSERT INTO books (book_code, book_name, price, stock_quantity, genre_code) 
    VALUES (:book_code, :book_name, :price, :stock_quantity, :genre_code)';

    // SQL文を用意する
    // 補足：prepare()メソッドはSQL文を実行するための準備をするメソッドで、SQL文を実行するわけではない
    $stmt_insert = $pdo->prepare($sql_insert);

    // bindValue()メソッドを使って実際の値をプレースホルダにバインドする（割り当てる）
    $stmt_insert->bindValue(':book_code', $_POST['book_code'], PDO::PARAM_INT);
    $stmt_insert->bindValue(':book_name', $_POST['book_name'], PDO::PARAM_STR);
    $stmt_insert->bindValue(':price', $_POST['price'], PDO::PARAM_INT);
    $stmt_insert->bindValue(':stock_quantity', $_POST['stock_quantity'], PDO::PARAM_INT);
    $stmt_insert->bindValue(':genre_code', $_POST['genre_code'], PDO::PARAM_STR);

    // SQL文を実行する
    $stmt_insert->execute();

    // 追加した件数を取得する
    $count = $stmt_insert->rowCount();

    // 登録完了メッセージを作成する
    $message = "商品を{$count}件登録しました。";

    //  登録完了メッセージを表示して商品一覧ページにリダイレクトさせる（同時にmessageパラメータも渡す）
    header("Location: book_list.php?message={$message}");
  } catch (PDOException $e) {
    exit($e->getMessage());
  }
}
?>

<?php include __DIR__ . '/header.php'; ?>
<main class="l-main">
  <article class="l-article p-article--narrow">
    <h1>商品登録</h1>
    <div class="p-book-create__back">
      <a href="book_list.php" class="c-btn">&lt; 戻る</a>
    </div>
    <form action="book_create.php" method="post" class="p-book-create__form">
      <div>
        <label for="book_code">品番</label>
        <input type="text" name="book_code" id="book_code" min="0" required>

        <label for="book_name">商品名</label>
        <input type="text" name="book_name" id="book_name" required>

        <label for="price">単価</label>
        <input type="number" name="price" id="price" min="0" required>

        <label for="stock_quantity">在庫数</label>
        <input type="number" name="stock_quantity" id="stock_quantity" min="0" required>

        <label for="genre_code">ジャンルコード</label>
        <select name="genre_code" id="genre_code" required>
          <option value="" disabled selected>選択してください</option>
          <?php
          // 配列の中身をforeach文で順番に取り出し、セレクトボックスの選択肢として出力する
          foreach ($genre_codes as $genre_code) {
            echo "<option value='{$genre_code}'>{$genre_code}</option>";
          }
          ?>
        </select>
      </div>
      <button type="submit" class="c-btn c-btn--submit" name="submit" value="submit">登録</button>
    </form>
  </article>
</main>

</body>

</html>