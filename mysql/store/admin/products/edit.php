<?php

require '../../functions.php';

if (! is_logged_in()) {
    $_SESSION['login_redirect'] = site_url('admin/products/edit.php');
    header('Location: '.site_url('admin/login.php'));
    exit;
}

if (empty($_GET['id'])) {
    set_message('Product ID is required.', 'error');
    header('Location: '.site_url('admin/products'));
    exit;
}

$product = get_product(intval($_GET['id']));

if (empty($product)) {
    set_message('Product does not exist.', 'error');
    header('Location: '.site_url('admin/products'));
    exit;
}

$errors = process_edit_product();

?><!doctype html>
<html>
<head>
    <title>Admin - Products - Edit</title>
</head>
<body>
<?php include '../../includes/header.php'; ?>
<section>
    <h2>Edit Product</h2>
    <form action="" method="post">
        <input type="hidden" name="product[id]" value="<?php echo $product['id']; ?>">
        <div>
            <input name="product[name]" placeholder="Name" value="<?php echo $product['name']; ?>">
            <?php render_error($errors, 'name'); ?>
        </div>
        <div>
            <textarea name="product[description]" placeholder="Description"><?php echo $product['description']; ?></textarea>
            <?php render_error($errors, 'description'); ?>
        </div>
        <div>
            <input name="product[price]" placeholder="Price" value="<?php echo $product['price']; ?>">
            <?php render_error($errors, 'price'); ?>
        </div>
        <div>
            <select name="product[category_id]">
                <option value="">--Select Category--</option>
                <?php foreach (get_categories() as $category) : ?>
                    <?php
                    if ($category['id'] == $product['category_id']) {
                        $selected = 'selected';
                    } else {
                        $selected = '';
                    }
                    ?>
                    <option value="<?php echo $category['id']; ?>" <?php echo $selected; ?>>
                        <?php echo $category['name']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <?php render_error($errors, 'category_id'); ?>
        </div>
        <div>
            <input type="submit">
        </div>
    </form>
</section>
<?php include '../../includes/footer.php'; ?>
</body>
</html>