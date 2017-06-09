<!doctype html>
<html>
<head>
    <title>Form</title>
</head>
<body>
<section>
    <?php
    if (! empty($_POST['name'])
        && !empty($_POST['comment'])) {
        file_put_contents(
            'comments.txt',
            date('d/m/Y H:i').' | '.$_POST['name'].': '.$_POST['comment'].PHP_EOL,
            FILE_APPEND
        );
    }

    if (file_exists('comments.txt')) {
        $text = file_get_contents('comments.txt');
        echo nl2br($text);
    }
    ?>
</section>
<section>
    <form method="post" action="">
        <input name="name" placeholder="Name"><br>
        <input name="email" placeholder="Email"><br>
        <textarea name="comment" title="Comment" placeholder="Comment"></textarea><br>
        <p><input type="submit"></p>
    </form>
</section>
</body>
</html>