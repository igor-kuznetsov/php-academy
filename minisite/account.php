<?php

require 'includes/functions.php';

if (! is_logged_in()) {
    $_SESSION['login_redirect'] = site_url('account.php');
    header('Location: login.php');
    exit;
}

$errors = process_account()

?><!doctype html>
<html>
<head>
    <title>My Account</title>
</head>
<body>
<?php include 'includes/header.php'; ?>
<section>
    <h2>My Account</h2>
    <form action="" method="post">
        <div>
            <label>Content Color:</label>
            <input name="account[color]" placeholder="Content Color" value="<?php echo get_user()['color']; ?>">
            <?php render_error($errors, 'color'); ?>
        </div>
        <div>
            <input type="submit">
        </div>
    </form>
</section>
<?php include 'includes/footer.php'; ?>
</body>
</html>