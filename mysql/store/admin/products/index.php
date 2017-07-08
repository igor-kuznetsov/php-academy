<?php

require '../../functions.php';

if (! is_logged_in()) {
    $_SESSION['login_redirect'] = site_url('admin/products');
    header('Location: '.site_url('admin/login.php'));
    exit;
}

?><!doctype html>
<html>
<head>
    <title>Admin - Products</title>
</head>
<body>
<?php include '../../includes/header.php'; ?>
<section>
    <h2>Products</h2>
    <p><a href="add.php">ADD</a></p>
    <table border="1" cellpadding="5" cellspacing="1">
        <thead>
        <tr>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach (get_all_products() as $product) : ?>
            <tr>
                <td><?php echo $product['name']; ?></td>
                <td><?php echo $product['category']; ?></td>
                <td>$<?php echo $product['price']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $product['id']; ?>">edit</a>
                    <a href="delete.php?id=<?php echo $product['id']; ?>">delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</section>
<?php include '../../includes/footer.php'; ?>
</body>
</html>