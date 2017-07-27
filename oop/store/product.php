<?php

require 'functions.php';

if (empty($_GET['id'])) {
    Message::set('Product ID is required.', Message::TYPE_ERROR);
    header('Location: '.site_url('index.php'));
    exit;
}

$product = Product::getById($_GET['id']);

if (empty($product)) {
    Message::set('Product does not exist.', Message::TYPE_ERROR);
    header('Location: '.site_url('index.php'));
    exit;
}

?><!doctype html>
<html>
<head>
    <title><?php echo $product->name; ?></title>
</head>
<body>
<?php include 'includes/header.php'; ?>
<section>
    <h2><?php echo $product->name; ?></h2>
    <p class="category"><?php echo $product->category; ?></p>
    <p class="price">$<?php echo $product->price; ?></p>
    <p class="description"><?php echo $product->description; ?></p>
    <p><a href="<?php echo $product->getLink('cart.php', ['action' => 'add']); ?>">add to cart</a></p>
</section>
<?php include 'includes/footer.php'; ?>
</body>
</html>