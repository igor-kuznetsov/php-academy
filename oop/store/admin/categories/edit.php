<?php

require '../../functions.php';

if (! Auth::isLoggedIn()) {
    $_SESSION['login_redirect'] = site_url('admin/categories/edit.php');
    header('Location: '.site_url('admin/login.php'));
    exit;
}

if (empty($_GET['id'])) {
    Message::set('Category ID is required.', Message::TYPE_ERROR);
    header('Location: '.site_url('admin/categories'));
    exit;
}

$category = Category::getById(intval($_GET['id']));

if (empty($category)) {
    Message::set('Category does not exist.', Message::TYPE_ERROR);
    header('Location: '.site_url('admin/categories'));
    exit;
}

$errors = Category::edit();

?><!doctype html>
<html>
<head>
    <title>Admin - Categories - Edit</title>
</head>
<body>
<?php include '../../includes/header.php'; ?>
<section>
    <h2>Edit Category</h2>
    <form action="" method="post">
        <input type="hidden" name="category[id]" value="<?php echo $category->id; ?>">
        <div>
            <input name="category[name]" placeholder="Name" value="<?php echo $category->name; ?>">
            <?php render_error($errors, 'name'); ?>
        </div>
        <div>
            <input type="submit">
        </div>
    </form>
</section>
<?php include '../../includes/footer.php'; ?>
</body>
</html>