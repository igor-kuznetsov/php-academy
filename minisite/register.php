<?php

require 'includes/functions.php';

if (is_logged_in()) {
    header('Location: index.php');
    exit;
}

$errors = process_register();

?><!doctype html>
<html>
<head>
    <title>Minisite - Register</title>
</head>
<body>
<?php include 'includes/header.php'; ?>
<section>
    <h2>Register</h2>
    <form action="" method="post">
        <div>
            <input name="register[email]" type="email" placeholder="Email">
            <?php render_error($errors, 'email'); ?>
        </div>
        <div>
            <input name="register[password]" type="password" placeholder="Password">
            <?php render_error($errors, 'password'); ?>
        </div>
        <div>
            <input name="register[confirm_password]" type="password" placeholder="Confirm Password">
            <?php render_error($errors, 'confirm_password'); ?>
        </div>
        <div>
            <input type="submit">
        </div>
    </form>
</section>
<?php include 'includes/footer.php'; ?>
</body>
</html>