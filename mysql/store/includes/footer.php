<p>&copy;MiniStore, <?php echo date('Y'); ?></p>
<nav>
    <ul>
        <?php if (is_logged_in()) : ?>
        <li>
            <a href="<?php echo site_url('admin/logout.php'); ?>">Log Out</a>
        </li>
        <?php else : ?>
        <li>
            <a href="<?php echo site_url('admin/login.php'); ?>">Admin</a>
        </li>
        <?php endif; ?>
    </ul>
</nav>
