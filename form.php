<?php
$dsn = 'pgsql:dbname=guest_book;host=localhost;';
$pdo = new PDO($dsn);

/*
$flashMessage = [
    "message" => "flash!",
    "state" => "info"
];
 */

// 投稿処理
if (!empty($_POST)) {
    $flashMessage = [
        "message" => "Posted!",
        "status" => "success",
        "debug" => "debugging"
    ];
}


// 同じ名前での投稿を無効にする

// 記事削除処理

// 記事表示処理

$sql = "SELECT * from posts order by created desc limit 10;";
$stmt = $pdo->query($sql);
$posts = $stmt->fetchAll();

// 自動入力処理

