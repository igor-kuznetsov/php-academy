<?php

require '../../functions.php';

if (! is_logged_in()) {
    $_SESSION['login_redirect'] = site_url('admin/categories/add.php');
    header('Location: '.site_url('admin/login.php'));
    exit;
}

if (empty($_GET['id'])) {
    set_message('Category ID is required.', 'error');
    header('Location: '.site_url('admin/categories'));
    exit;
}

delete_category(intval($_GET['id']));
set_message('Category has been deleted.');
header('Location: '.site_url('admin/categories'));
exit;