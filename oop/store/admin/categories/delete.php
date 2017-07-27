<?php

require '../../functions.php';

if (! Auth::isLoggedIn()) {
    $_SESSION['login_redirect'] = site_url('admin/categories/add.php');
    header('Location: '.site_url('admin/login.php'));
    exit;
}

if (empty($_GET['id'])) {
    Message::set('Category ID is required.', Message::TYPE_ERROR);
    header('Location: '.site_url('admin/categories'));
    exit;
}

Category::deleteById(intval($_GET['id']));
Message::set('Category has been deleted.');
header('Location: '.site_url('admin/categories'));
exit;