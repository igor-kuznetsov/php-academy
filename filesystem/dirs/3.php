<?php

//chdir('aaaaa');
//mkdir('aaaaa');

//rmdir('aaaaa/aaaaa');
//rmdir('aaaaa');

chdir('..');
$scan = scandir('dirs', SCANDIR_SORT_NONE);
$result = array_values(array_diff($scan, ['.', '..']));
var_dump($result);
echo '<hr>';

chdir('dirs');
$res = glob('*.txt');
var_dump($res);