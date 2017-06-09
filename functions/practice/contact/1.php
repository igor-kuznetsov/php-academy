<!doctype html>
<html>
<head>
    <title>Form</title>
</head>
<body>
<section>
    <?php
    if (! empty($_POST['text'])) {
        echo $_POST['text'];
    }
    ?>
</section>
<section>
    <form method="post" action="">
        <textarea name="text" title="text"></textarea><br>
        <p><input type="submit"></p>
    </form>
</section>
</body>
</html>