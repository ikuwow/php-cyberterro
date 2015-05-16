<?php
$dsn = 'pgsql:dbname=guest_book;host=localhost';
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

// insert
// 同じ名前での投稿を無効にする

// 記事削除処理

// 記事表示処理

// 自動入力処理

