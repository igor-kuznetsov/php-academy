<?php

require '../../functions.php';

if (! is_logged_in()) {
    $_SESSION['login_redirect'] = site_url('admin/categories/add.php');
    header('Location: '.site_url('admin/login.php'));
    exit;
}

$errors = process_add_category();

?><!doctype html>
<html>
<head>
    <title>Admin - Categories - Add</title>
</head>
<body>
<?php include '../../includes/header.php'; ?>
<section>
    <h2>Add Category</h2>
    <form action="" method="post">
        <div>
            <input name="category[name]" placeholder="Name">
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