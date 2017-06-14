<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="image5555">
    <input type="submit">
</form>
<?php

if (!empty($_FILES)) {
    print "<pre>";
    print_r($_FILES);
    print "</pre>";
    //$_FILES['image5555']['size']
    if ($_FILES['image5555']['type'] != 'image/jpeg') {
        $error['image5555'] = 'Image required';
    }

    if (empty($error)) {
        if (! is_dir('test')) {
            mkdir('test');
        }
        move_uploaded_file($_FILES['image5555']['tmp_name'], 'test'.DIRECTORY_SEPARATOR.$_FILES['image5555']['name']);
    }
}