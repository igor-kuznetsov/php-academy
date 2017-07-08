<?php

require 'functions.php';

if (empty($_GET['id'])) {
    set_message('Product ID is required.', 'error');
    header('Location: '.site_url('/'));
    exit;
}

$product = get_product(intval($_GET['id']));

if (empty($product)) {
    set_message('Product does not exist.', 'error');
    header('Location: '.site_url('/'));
    exit;
}

?><!doctype html>
<html>
<head>
    <title>My Cart</title>
</head>
<body>
<?php include 'includes/header.php'; ?>
<section>
    <h2>My Cart</h2>
</section>
<?php include 'includes/footer.php'; ?>
</body>
</html>