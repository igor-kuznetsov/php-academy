<?php

require '../../functions.php';

if (! Auth::isLoggedIn()) {
    $_SESSION['login_redirect'] = site_url('admin/products/add.php');
    header('Location: '.site_url('admin/login.php'));
    exit;
}

if (empty($_GET['id'])) {
    Message::set('Product ID is required.', Message::TYPE_ERROR);
    header('Location: '.site_url('admin/products'));
    exit;
}

Product::deleteById(intval($_GET['id']));
Message::set('Product has been deleted.');
header('Location: '.site_url('admin/products'));
exit;