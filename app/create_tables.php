<?php
// データベース接続
$dsn = 'mysql:dbname=strs20250818_app;host=localhost;charset=utf8mb4';
$user = 'strs20250818_pa';
$password = 'pass.star01';

try {
  $pdo = new PDO($dsn, $user, $password);


  // genresテーブル作成（ジャンル情報）
  $sqlGenres =
    ' CREATE TABLE IF NOT EXISTS genres (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    genre_code INT(11) NOT NULL UNIQUE,
    genre_name VARCHAR(50) NOT NULL
)';

  // SQL文を実行する
  $pdo->query($sqlGenres);

  // booksテーブル作成（商品情報）
  $sqlBooks =
    ' CREATE TABLE IF NOT EXISTS books (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    book_code INT(11) NOT NULL,
    book_name VARCHAR(50) NOT NULL,
    price INT(11) NOT NULL,
    stock_quantity INT(11) NOT NULL,
    genre_code INT(11) NOT NULL,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY(genre_code) REFERENCES genres(genre_code)
)';

  // SQL文を実行する
  $pdo->query($sqlBooks);

  echo "テーブルの作成に成功しました。";

  //実行して結果を表示
} catch (PDOException $e) {
  exit("エラー:<br>" . $e->getMessage());
}
