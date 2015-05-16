<?php require_once 'form.php'; ?>
<html lang="ja">
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="./common.css"/>
</head>
<body>

<div class="container">

<?php if (isset($flashMessage)): ?>
<div class="flash-box flash-<?=$flashMessage["status"]?>">
    <span class="flash-kind"><?=strtoupper($flashMessage["status"])?>: </span>
    <?= $flashMessage["message"] ?>

<?php if (isset($flashMessage["debug"])): ?>
    <div class="flash-debug">
    <?= $flashMessage["debug"]?>
    </div>
<?php endif;?>

</div>
<?php endif; ?>

<h1>Guest Book</h1>

<p>Hello World.</p>

<div class="form-box">
<h2>Post Form:</h2>
<form taget="form.php" method="post">
    <label>Title: <input type="text" name="post[title]"/></label>
    <label>name: <input type="text" name="post[name]"/></label>
    <label>Body: <input type="text" name="post[body]"/></label>
    <label>Password: <input type="text" name="post[password]"/></label>
    <input type="submit" value="Submit" />
</form>
</div><!-- .form-box -->


<div class="post-list-box">
<h2>Post List</h2>
<?php if(isset($posts)): ?>
    <?php foreach($posts as $post): ?>
        <div class="single-post">
        <h3><?= "ID {$post['id']}: {$post['title']}" ?></h3>
        <p><?= $post['name'] ?></p>
        <p><?= $post['body'] ?></p>
        <p><?= $post['created'] ?></p>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>投稿なし</p>
<?php endif;?>
</div><!-- .post-list-box -->


<h2>Delete Form</h2>
<form taget="form.php" method="post">
    <label>Post ID: <input type="text" name="delete[id]"/></label>
    <label>Password: <input type="text" name="delete[password]"/></label>
    <input type="submit" value="Submit" />
</form>

<div class="sql-dump-box">
<h4>SQL Dump</h4>
<?php foreach($sql_dump as $sql): ?>
    <pre><?= $sql?></pre>
<?php endforeach; ?>
</div>


</div><!-- .container -->
<script type="text/javascript" src="./common.js"></script>
</body>
</html>

