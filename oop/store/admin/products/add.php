<?php

require '../../functions.php';

if (! Auth::isLoggedIn()) {
    $_SESSION['login_redirect'] = site_url('admin/products/add.php');
    header('Location: '.site_url('admin/login.php'));
    exit;
}

$errors = Product::add();

?><!doctype html>
<html>
<head>
    <title>Admin - Products - Add</title>
</head>
<body>
<?php include '../../includes/header.php'; ?>
<section>
    <h2>Add Product</h2>
    <form action="" method="post">
        <div>
            <input name="product[name]" placeholder="Name">
            <?php render_error($errors, 'name'); ?>
        </div>
        <div>
            <textarea name="product[description]" placeholder="Description"></textarea>
            <?php render_error($errors, 'description'); ?>
        </div>
        <div>
            <input name="product[price]" placeholder="Price">
            <?php render_error($errors, 'price'); ?>
        </div>
        <div>
            <select name="product[category_id]">
                <option value="">--Select Category--</option>
                <?php foreach (Category::getAll() as $category) : ?>
                    <option value="<?php echo $category->id; ?>">
                        <?php echo $category->name; ?>
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