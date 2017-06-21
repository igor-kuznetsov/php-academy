<?php

require 'includes/functions.php';

?><!doctype html>
<html>
<head>
    <title>Home</title>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <section>
        <h2>Welcome to Minisite!</h2>
        <?php if (! is_logged_in()) : ?>
            <p>Please log in to get access to all our pages.</p>
        <?php endif; ?>
    </section>
    <?php include 'includes/footer.php'; ?>
</body>
</html>