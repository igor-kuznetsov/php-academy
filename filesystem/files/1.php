<?php

$handle = fopen('alpha.txt', 'r+');
echo fread($handle, 5) . "<br>";
echo fread($handle, 5) . "<br>";
rewind($handle);
echo fread($handle, 10) . "<br>";
fseek($handle, 20);
echo fread($handle, 5) . "<br>";
fwrite($handle, '7777777777777');
rewind($handle);
echo fread($handle, filesize('alpha.txt'));
fclose($handle);