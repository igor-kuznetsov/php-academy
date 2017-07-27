<nav>
    <ul>
        <li>
            <a href="<?php echo site_url('/'); ?>">Home</a>
        </li>
        <li>
            <a href="<?php echo site_url('cart.php'); ?>">My Cart (<?php echo Cart::getCount(); ?>)</a>
        </li>
        <?php if (Auth::isLoggedIn()) : ?>
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