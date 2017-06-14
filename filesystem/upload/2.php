<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="gallery[]">
    <input type="file" name="gallery[]">
    <input type="file" name="gallery[]">
    <input type="submit">
</form>
<?php

if (!empty($_FILES)) {
    print "<pre>";
    print_r($_FILES);
    print "</pre>";

    foreach ($_FILES['gallery']['error'] as $key => $error) {
        if ($error == UPLOAD_ERR_OK) {
            $tmp_name = $_FILES['gallery']['tmp_name'][$key];
            move_uploaded_file($tmp_name, 'test/my_gallery_'.time().'.jpeg');
        }
    }
}

$uploaded_files = array_diff(scandir('test'), ['.', '..']);
foreach ($uploaded_files as $uploaded_file) {
    echo '<img height="100px" src="test'.DIRECTORY_SEPARATOR.$uploaded_file.'" alt="">';
}