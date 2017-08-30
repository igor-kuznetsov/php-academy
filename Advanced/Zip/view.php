<?php

$zip = new ZipArchive();
$zip->open('test.zip');

echo '<pre>';
print_r($zip);
echo '<hr>';
echo "num files: $zip->numFiles<br>";
echo "status: $zip->status<br>";
echo "filename: $zip->filename<br>";
echo '<hr>';

for ($i = 0, $count = $zip->numFiles; $i < $count; $i++) {
    print_r($zip->statIndex($i));
}