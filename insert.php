<?php

//1. POSTデータ取得
$book_name = $_POST['book_name']; // 名前を取得
$book_url = $_POST['book_url']; // Eメールアドレスを取得
$book_comment = $_POST['book_comment']; // 内容を取得

//2. DB接続します
require_once('funcs.php');
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_an_table(book_name, book_url, book_comment, date) VALUES(:book_name, :book_url, :book_comment, NOW())");

// 数値の場合 PDO::PARAM_INT
// 文字の場合 PDO::PARAM_STR
$stmt->bindValue(':book_name', $book_name, PDO::PARAM_STR);
$stmt->bindValue(':book_url', $book_url, PDO::PARAM_STR);
$stmt->bindValue(':book_comment', $book_comment, PDO::PARAM_STR);

$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status == false) {
    sql_error($stmt);
} else {
    redirect('index.php');
};

?>