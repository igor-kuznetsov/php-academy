<!doctype html>
<html>
<head>
    <title>Form</title>
</head>
<body>
<section>
    <?php
//    $a = [34, 56, 78, ['name' => 'Asssd']];
//    echo serialize($a);

    // get old content
    $messages = [];

    if (file_exists('comments.txt')) {
        $text = file_get_contents('comments.txt');
        if (!empty($text)) {
            $messages = unserialize($text);
        }
    }

    // check if form sent
    if (! empty($_POST['name']) && !empty($_POST['comment'])) {
        // create new content
        $message = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'comment' => $_POST['comment'],
            'datetime' => date('d/m/Y H:i'),
        ];

        // add new content to old content
        $messages[] = $message;
    }

    // save all to file
    file_put_contents('comments.txt', serialize($messages));

    // output messages
    foreach ($messages as $m) {
        echo $m['datetime'] . ' | ' . $m['name'] . ': ' . $m['comment'] . "<br>";
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