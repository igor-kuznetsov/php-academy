<p>&copy;Minisite, <?php echo date('Y'); ?></p>
<nav>
    <ul>
        <?php if (is_logged_in()) : ?>
        <li>
            <a href="<?php echo site_url('account.php'); ?>">My Account</a>
        </li>
        <li>
            <a href="<?php echo site_url('logout.php'); ?>">Log Out</a>
        </li>
        <?php else : ?>
        <li>
            <a href="<?php echo site_url('login.php'); ?>">Log In</a>
        </li>
        <li>
            <a href="<?php echo site_url('register.php'); ?>">Register</a>
        </li>
        <?php endif; ?>
    </ul>
</nav>
