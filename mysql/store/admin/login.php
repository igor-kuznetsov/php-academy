<?php

require '../functions.php';

if (is_logged_in()) {
    header('Location: '.site_url('admin'));
    exit;
}

$errors = process_login();

?><!doctype html>
<html>
<head>
    <title>Admin - Login</title>
</head>
<body>
<?php include '../includes/header.php'; ?>
<section>
    <h2>Log In</h2>
    <form action="" method="post">
        <div>
            <input name="login[login]" placeholder="Login">
            <?php render_error($errors, 'login'); ?>
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
<?php include '../includes/footer.php'; ?>
</body>
</html>