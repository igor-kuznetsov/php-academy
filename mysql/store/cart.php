<?php

require 'functions.php';

if (empty($_GET['action'])) {
    $action = 'add';
} else {
    $action = $_GET['action'];
}

if ($action == 'clear') {
    clear_cart();
}

if (!empty($_GET['id'])) {
    $product = get_product(intval($_GET['id']));

    if (empty($product)) {
        set_message('Product does not exist.', 'error');
        header('Location: '.site_url('/'));
        exit;
    }

    switch ($action) {
        case 'remove':
            remove_from_cart(intval($_GET['id']));
            break;
        case 'add':
            add_to_cart(intval($_GET['id']));
            break;
        default:
            break;
    }
}

$products = get_cart_products();

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
                        <a href="product.php?id=<?php echo $product['id']; ?>">
                            <?php echo $product['name']; ?>
                        </a>
                    </p>
                    <p><?php echo $product['category']; ?></p>
                    <p>$<?php echo $product['price']; ?></p>
                    <p>
                        <a href="cart.php?id=<?php echo $product['id']; ?>&action=remove">remove from cart</a>
                    </p>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</section>
<?php include 'includes/footer.php'; ?>
</body>
</html>