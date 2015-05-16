<?php require_once 'form.php'; ?>
<html lang="ja">
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="./common.css"/>
</head>
<body>

<div class="container">

<?php if (isset($flashMessage)): ?>
<div class="flash-box flash-<?=$flashMessage["state"]?>">
    <span class="flash-kind"><?=strtoupper($flashMessage["state"])?>: </span>
    <?= $flashMessage["message"] ?>
</div>
<?php endif; ?>

<h1>Guest Book</h1>

<p>Hello World.</p>

<div class="form-box">

<form taget="form.php" method="post">
    <label>Title: <input type="text" name="post[title]"/></label>
    <label>Body: <input type="text" name="post[body]"/></label>
    <label>Password: <input type="text" name="post[password]"/></label>
    <input type="submit" value="Submit" />
</form>

</div><!-- .form-box -->

</div><!-- .container -->
<script type="text/javascript" src="./common.js"></script>
</body>
</html>

