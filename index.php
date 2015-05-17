<?php require_once 'form.php'; ?>
<?php require_once 'functions.php'; ?>
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
    <label>name: <input type="text" name="post[name]"/></label><br/>
    <label>Body: <textarea type="text" name="post[body]" rows="4" cols="40"/></textarea></label><br/>
    <label>Password: <input type="password" name="post[password]" value="<?=$prev_password?>"/></label>
    <input type="submit" value="Submit" />
</form>
</div><!-- .form-box -->


<div class="post-list-box">
<h2>Post List (<?= count($posts) ?>)</h2>
<?php if(isset($posts)): ?>
    <?php foreach($posts as $post): ?>
        <div class="single-post">
        <h3><?= h("ID {$post['id']}: {$post['title']}") ?></h3>
        <p>Name: <?= h($post['name']) ?></p>
        <p><?= h($post['body']) ?></p>
        <p>Posted at <?= $post['created'] ?></p>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>投稿なし</p>
<?php endif;?>
</div><!-- .post-list-box -->


<h2>Delete Form</h2>
<form taget="form.php" method="post">
    <label>Post ID: <input type="text" name="delete[id]"/></label>
    <label>Password: <input type="password" name="delete[password]" value="<?=$prev_password?>"/></label>
    <input type="submit" value="Submit" />
</form>

<div class="sql-dump-box">
<h4>SQL Dump</h4>
<?php foreach($sql_dump as $sql): ?>
    <pre><?= h($sql)?></pre>
<?php endforeach; ?>
</div>

<div class="var-dump-box">
    <h4>Var Dump</h4>

    <h5>$_COOKIE</h5>
    <pre><?= h(var_dump($_COOKIE)) ?></pre>

    <h5>$_POST</h5>
    <pre><?= h(var_dump($_POST)) ?></pre>

    <h5>$_SESSION</h5>
    <?php if (isset($_SESSION)): ?>
        <pre><?= h(var_dump($_SESSION)) ?></pre>
    <?php else: ?>
        <pre>Undefined</pre>
    <?php endif; ?>
</div>


</div><!-- .container -->

<script type="text/javascript" src="./common.js"></script>

</body>
</html>

