<nav>
    <ul>
        <li>
            <a href="<?php echo site_url('/'); ?>">Home</a>
        </li>
        <li>
            <a href="<?php echo site_url('cart.php'); ?>">My Cart</a>
        </li>
        <?php if (is_logged_in()) : ?>
        <li>
            <a href="<?php echo site_url('admin'); ?>">Admin</a>
            <ul>
                <li>
                    <a href="<?php echo site_url('admin/products'); ?>">Products</a>
                </li>
                <li>
                    <a href="<?php echo site_url('admin/categories'); ?>">Categories</a>
                </li>
            </ul>
        </li>
        <?php endif; ?>
    </ul>
</nav>

<?php include 'messages.php'; ?>