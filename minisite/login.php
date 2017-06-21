<?php

require 'includes/functions.php';

if (is_logged_in()) {
    header('Location: index.php');
    exit;
}

$errors = process_login();

?><!doctype html>
<html>
<head>
    <title>Minisite - Log In</title>
</head>
<body>
<?php include 'includes/header.php'; ?>
<section>
    <h2>Log In</h2>
    <form action="" method="post">
        <div>
            <input name="login[email]" type="email" placeholder="Email">
            <?php render_error($errors, 'email'); ?>
        </div>
        <div>
            <input name="login[password]" type="password" placeholder="Password">
            <?php render_error($errors, 'password'); ?>
        </div>
        <div>
            <input type="submit">
        </div>
    </form>
</section>
<?php include 'includes/footer.php'; ?>
</body>
</html>