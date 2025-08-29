<?php
// DB接続情報
$dsn = 'mysql:dbname=strs20250818_app;host=localhost;charset=utf8mb4';
$user = 'strs20250818_pa';
$password = 'pass.star01';


// DB接続
try {
  $pdo = new PDO($dsn, $user, $password);

  // 動的に変わる値をプレースホルダに置き換えたINSERT文をあらかじめ用意する
  $sql_delete = 'DELETE FROM books WHERE id = :id';

  // SQL文を用意する
  // 補足：prepare()メソッドはSQL文を実行するための準備をするメソッドで、SQL文を実行するわけではない
  $stmt_delete = $pdo->prepare($sql_delete);

  // bindValue()メソッドを使って実際の値をプレースホルダにバインドする（割り当てる）
  $stmt_delete->bindValue(':id', $_GET['id'], PDO::PARAM_INT);

  // SQL文を実行する
  $stmt_delete->execute();

  // 削除した件数を取得する
  $count = $stmt_delete->rowCount();

  // 削除完了メッセージを作成する
  $message = "商品を{$count}件削除しました。";

  //  削除完了メッセージを表示して商品一覧ページにリダイレクトさせる（同時にmessageパラメータも渡す）
  header("Location: book_list.php?message={$message}");
} catch (PDOException $e) {
  exit($e->getMessage());
}
