<?php

$zip = new ZipArchive();
$zip_file = 'test.zip';

if ($zip->open($zip_file, ZipArchive::CREATE) !== true) {
    exit("Cannot open file $zip_file");
}

$file1 = 'testfile-1-' . time() . '.txt';
$zip->addFromString($file1, 'Test string added as file testfile-1.txt');

$file2 = 'testfile-2-' . time() . '.txt';
$zip->addFromString($file2, 'Test string added as file testfile-2.txt');

$zip->addFile('test.php', 'testphpfile.php');

echo "Files: $zip->numFiles<br>";
echo "Status: $zip->status";

$zip->close();