<?php

require 'functions.php';

if (empty($_GET['action'])) {
    $action = 'add';
} else {
    $action = $_GET['action'];
}

if ($action == 'clear') {
    Cart::clear();
}

if (!empty($_GET['id'])) {
    $product = Product::getById(intval($_GET['id']));

    if (empty($product)) {
        Message::set('Product does not exist.', Message::TYPE_ERROR);
        header('Location: '.site_url('/'));
        exit;
    }

    switch ($action) {
        case 'remove':
            Cart::remove(intval($_GET['id']));
            break;
        case 'add':
            Cart::add(intval($_GET['id']));
            break;
        default:
            break;
    }
}

$products = Cart::getProducts();

?><!doctype html>
<html>
<head>
    <title>My Cart</title>
</head>
<body>
<?php include 'includes/header.php'; ?>
<section>
    <h2>
        My Cart
        <span style="font-weight:normal;font-size:80%">
            (<a href="cart.php?action=clear">clear my cart</a>)
        </span>
    </h2>
    <?php if (!empty($products)) : ?>
        <ul class="products">
            <?php foreach ($products as $product) : ?>
                <li>
                    <p>
                        <a href="<?php echo $product->getLink('product.php'); ?>">
                            <?php echo $product->name; ?>
                        </a>
                    </p>
                    <p><?php echo $product->category; ?></p>
                    <p>$<?php echo $product->price; ?></p>
                    <p>
                        <a href="<?php echo $product->getLink('cart.php', ['action' => 'remove']); ?>">remove from cart</a>
                    </p>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</section>
<?php include 'includes/footer.php'; ?>
</body>
</html>