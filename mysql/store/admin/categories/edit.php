<?php

require '../../functions.php';

if (! is_logged_in()) {
    $_SESSION['login_redirect'] = site_url('admin/categories/edit.php');
    header('Location: '.site_url('admin/login.php'));
    exit;
}

if (empty($_GET['id'])) {
    set_message('Category ID is required.', 'error');
    header('Location: '.site_url('admin/categories'));
    exit;
}

$category = get_category(intval($_GET['id']));

if (empty($category)) {
    set_message('Category does not exist.', 'error');
    header('Location: '.site_url('admin/categories'));
    exit;
}

$errors = process_edit_category();

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
        <input type="hidden" name="category[id]" value="<?php echo $category['id']; ?>">
        <div>
            <input name="category[name]" placeholder="Name" value="<?php echo $category['name']; ?>">
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