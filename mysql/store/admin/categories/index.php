<?php

require '../../functions.php';

if (! is_logged_in()) {
    $_SESSION['login_redirect'] = site_url('admin/categories');
    header('Location: '.site_url('admin/login.php'));
    exit;
}

?><!doctype html>
<html>
<head>
    <title>Admin - Categories</title>
</head>
<body>
<?php include '../../includes/header.php'; ?>
<section>
    <h2>Categories</h2>
    <p><a href="add.php">ADD</a></p>
    <table border="1" cellpadding="5" cellspacing="1">
        <thead>
        <tr>
            <th>Name</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach (get_categories() as $category) : ?>
            <tr>
                <td><?php echo $category['name']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $category['id']; ?>">edit</a>
                    <a href="delete.php?id=<?php echo $category['id']; ?>">delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</section>
<?php include '../../includes/footer.php'; ?>
</body>
</html>