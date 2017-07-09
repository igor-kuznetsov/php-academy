<?php

require 'functions.php';

if (empty($_GET['id'])) {
    set_message('Product ID is required.', 'error');
    header('Location: '.site_url('index.php'));
    exit;
}

$product = get_product($_GET['id']);

if (empty($product)) {
    set_message('Product does not exist.', 'error');
    header('Location: '.site_url('index.php'));
    exit;
}

?><!doctype html>
<html>
<head>
    <title><?php echo $product['name']; ?></title>
</head>
<body>
<?php include 'includes/header.php'; ?>
<section>
    <h2><?php echo $product['name']; ?></h2>
    <p class="category"><?php echo $product['category']; ?></p>
    <p class="price">$<?php echo $product['price']; ?></p>
    <p class="description"><?php echo $product['description']; ?></p>
    <p><a href="cart.php?id=<?php echo $product['id']; ?>&action=add">add to cart</a></p>
</section>
<?php include 'includes/footer.php'; ?>
</body>
</html>