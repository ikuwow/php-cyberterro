<?php
$dsn = 'pgsql:dbname=guest_book;host=localhost;';
$pdo = new PDO($dsn);

/*
$flashMessage = [
    "message" => "flash!",
    "state" => "info"
];
 */

$sql_dump = [];


// 投稿処理
if (!empty($_POST['post'])) {

    $in_post = $_POST['post'];

    // ユーザー確認
    $sql = 'SELECT count(id) FROM posts WHERE name = :name AND password != :password';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':name' => $in_post['name'],
        ':password' => $in_post['password']
    ]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result['count'] > 0) {

        $flashMessage = [
            'message' => "User {$in_post['name']}'s password is wrong!!",
            'status' => 'error'
        ];

    } else {

        $sql = "INSERT INTO posts (title, name, body, password) VALUES (:title, :name, :body, :password);";
        $stmt = $pdo->prepare($sql);
        $is_succeeded = $stmt->execute([
            ':title' => $in_post['title'],
            ':name' => $in_post['name'],
            ':body' => $in_post['body'],
            ':password' => $in_post['password'],
        ]);

        if ($is_succeeded && $stmt->rowCount()>=1) {
            $flashMessage = [
                'message' => "Post title {$in_post['title']} was sucessfully created!",
                'status' => 'success'
            ];
        } else {
            $flashMessage = [
                'message' => "Post title {$in_post['title']} could not posted...",
                'status' => 'error'
            ];
        }

        $_COOKIE['password'] = $in_post['password'];

        $sql_dump[] = $stmt->queryString;
    }

}

// 記事削除処理
if (isset($_POST['delete'])) {

    $d = $_POST['delete'];
    $_COOKIE['password'] = $d['password'];

    /* valnerable
    $sql = "UPDATE posts SET deleted = NOW() WHERE id = '{$d['id']}' AND password = '{$d['password']}';";
    $stmt = $pdo->query($sql);
     */
    $sql = "UPDATE posts SET deleted = NOW() WHERE id = :id AND password = :password";
    $stmt = $pdo->prepare($sql);
    $is_succeeded = $stmt->execute([
        ':id' => $d['id'],
        ':password' => $d['password']
    ]);
    // var_dump($is_succeeded);

    if ($is_succeeded && $stmt->rowCount()>=1) {
        $flashMessage = [
            'message' => "Post ID {$d['id']} was sucessfully deleted.",
            'status' => 'success'
        ];
    } else {
        $flashMessage = [
            'message' => "Post ID {$d['id']} could not deleted",
            'status' => 'error'
        ];
    }

    $sql_dump[] = $stmt->queryString;
}


// 同じ名前での投稿を無効にする

// 自動入力処理

// 記事表示処理
$sql = 'SELECT * FROM posts WHERE deleted IS NULL ORDER BY created DESC LIMIT 10;';
$stmt = $pdo->query($sql);
$posts = $stmt->fetchAll();
$prev_password = isset($_COOKIE['password']) ? $_COOKIE['password'] : '';
$sql_dump[] = $stmt->queryString;


