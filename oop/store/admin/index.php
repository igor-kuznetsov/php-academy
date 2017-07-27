<?php

require '../functions.php';

if (! Auth::isLoggedIn()) {
    $_SESSION['login_redirect'] = site_url('admin');
    header('Location: '.site_url('admin/login.php'));
    exit;
}

?><!doctype html>
<html>
<head>
    <title>Admin</title>
</head>
<body>
<?php include '../includes/header.php'; ?>
<section>
    <h2>Admin</h2>
    <p>Welcome to MiniStore admin panel!</p>
</section>
<?php include '../includes/footer.php'; ?>
</body>
</html>