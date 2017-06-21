<?php

require 'includes/functions.php';

if (empty($_GET['name']) || ! is_page_exists($_GET['name'])) {
    $page_name = '404';
} else {
    $page_name = $_GET['name'];
}

if (! is_logged_in()) {
    $_SESSION['login_redirect'] = site_url('page.php?name='.$page_name);
    header('Location: login.php');
    exit;
}

?><!doctype html>
<html>
<head>
    <title><?php echo ucfirst($page_name); ?></title>
</head>
<body>
<?php include 'includes/header.php'; ?>
<section style="color:<?php echo get_user()['color']; ?>">
    <?php render_page($page_name); ?>
</section>
<?php include 'includes/footer.php'; ?>
</body>
</html>