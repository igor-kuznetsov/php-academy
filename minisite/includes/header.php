<nav>
    <ul>
        <li>
            <a href="<?php echo site_url('/'); ?>">
                Home
            </a>
        </li>
        <li>
            <a href="<?php echo site_url('page.php?name=about'); ?>">
                About
            </a>
        </li>
        <li>
            <a href="<?php echo site_url('page.php?name=articles'); ?>">
                Articles
            </a>
        </li>
    </ul>
</nav>

<?php include 'messages.php'; ?>