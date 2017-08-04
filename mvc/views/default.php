<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <header>HEADER</header>
    <section>
        <?php echo Lang::get('test2', 'DEFAULT TEXT'); ?><br>
        <?php echo Lang::get('test', 'DEFAULT TEXT'); ?><br>
        <?php echo Lang::get('test3', 'DEFAULT TEXT'); ?><br>
        <?php echo $data['content']; ?>
    </section>
    <footer>FOOTER</footer>
</body>
</html>