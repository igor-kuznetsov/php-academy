<?php

require 'functions.php';

if (empty($_GET['page'])) {
    $page = 1;
} else {
    $page = intval($_GET['page']);
}

?><!doctype html>
<html>
<head>
    <title>Home</title>
</head>
<body>
<?php include 'includes/header.php'; ?>
<section>
    <h2>Welcome to MiniStore!</h2>
    <?php $products = get_products($page); ?>
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
                        <a href="cart.php?id=<?php echo $product['id']; ?>">add to cart</a>
                    </p>
                </li>
            <?php endforeach; ?>
            <?php $links = get_products_pagination(); ?>
            <?php if (!empty($links)) : ?>
                <li>
                    <?php foreach ($links as $link) : ?>
                        <?php if ($page == $link['name']) : ?>
                            <span>
                                <?php echo $link['name']; ?>
                            </span>
                        <?php else : ?>
                            <a href="<?php echo $link['href']; ?>" style="margin: 0 4px;">
                                <?php echo $link['name']; ?>
                            </a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </li>
            <?php endif; ?>
        </ul>
    <?php endif; ?>
</section>
<?php include 'includes/footer.php'; ?>
</body>
</html>