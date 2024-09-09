<?php
// SESSIONスタート
// ★この１行は必須★
// この１行で、新しいセッションを開始しセッションIDが割り当てられて、ファイルが作成される。
session_start();

$name = 'jone';
$age = 30;

echo $name . $age;

// SESSION変数にデータを登録
$_SESSION['name'] = $name;
$_SESSION['age'] = $age;

session_start();

// session_start()が書かれているところ以下のどこでも適当な箇所に以下追加
// SESSIONのidを取得
$sid = session_id();
echo $sid;

?>