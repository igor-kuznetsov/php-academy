<!doctype html>
<html>
<head>
    <title>Form</title>
</head>
<body>
<section>
    <?php
    $black_list = [
        'fuck', 'shit'
    ];
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
    if (isset($_POST['name']) && isset($_POST['comment'])) {
        // check if values are empty
        if (!empty($_POST['name']) && !empty($_POST['comment'])) {
            //filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)
            if (ctype_alpha(str_replace(' ', '', $_POST['name']))) {
                if (isMat($_POST['comment'])) {
                    alert('Please remove all bad words from your comment.');
                } else {
                    // create new content
                    $message = [
                        'name' => $_POST['name'],
                        'email' => $_POST['email'],
                        'comment' => $_POST['comment'],
                        'datetime' => date('d/m/Y H:i'),
                    ];

                    // add new content to old content
                    $messages[] = $message;
                    unset($_POST['name']);
                    unset($_POST['email']);
                    unset($_POST['comment']);
                }
            } else {
                alert('Name must contain letters and whitespaces only.');
            }
        } else {
            alert('Please enter name and comment.');
        }
    }

    // save all to file
    file_put_contents('comments.txt', serialize($messages));

    // output messages
    foreach ($messages as $m) {
        echo $m['datetime'] . ' | ' . htmlspecialchars($m['name']) . ': ' . strip_tags($m['comment'], '<b><p><i>') . "<br>";
    }

    /**
     * @param $str
     */
    function alert($str)
    {
        echo '<div style="color:red">' . $str . '</div>';
    }

    /**
     * @param string $str
     * @return bool
     */
    function isMat(string $str):bool
    {
        global $black_list;

        foreach ($black_list as $bad_word) {
            if (strpos($str, $bad_word) !== false) {
                return true;
            }
        }

        return false;
    }
    ?>
</section>
<section>
    <form method="post" action="">
        <input name="name" placeholder="Name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>"><br>
        <input name="email" placeholder="Email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>"><br>
        <textarea name="comment" title="Comment" placeholder="Comment"><?php
            echo isset($_POST['comment']) ? $_POST['comment'] : '';
            ?></textarea><br>
        <p><input type="submit"></p>
    </form>
</section>
</body>
</html>