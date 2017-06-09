<!doctype html>
<html>
<head>
    <title>Form</title>
</head>
<body>
<section>
    <?php
    if (! empty($_POST['text1'])) {
        file_put_contents('comments.txt', $_POST['text1'].PHP_EOL, FILE_APPEND);
    }

    if (file_exists('comments.txt')) {
        $text = file_get_contents('comments.txt');
        echo nl2br($text);
    }
    ?>
</section>
<section>
    <form method="post" action="">
        <textarea name="text1" title="text"></textarea><br>
        <p><input type="submit"></p>
    </form>
</section>
</body>
</html>