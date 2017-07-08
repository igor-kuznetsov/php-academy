<?php

require '../../functions.php';

if (! is_logged_in()) {
    $_SESSION['login_redirect'] = site_url('admin/products/add.php');
    header('Location: '.site_url('admin/login.php'));
    exit;
}

if (empty($_GET['id'])) {
    set_message('Product ID is required.', 'error');
    header('Location: '.site_url('admin/products'));
    exit;
}

delete_product(intval($_GET['id']));
set_message('Product has been deleted.');
header('Location: '.site_url('admin/products'));
exit;