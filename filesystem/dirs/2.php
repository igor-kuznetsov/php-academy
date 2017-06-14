<?php

chdir('..');
$h = opendir('files');
//var_dump($h);
echo readdir($h) . "<br>";
echo readdir($h) . "<br>";
echo readdir($h) . "<br>";
echo readdir($h) . "<br>";
echo readdir($h) . "<br>";
//var_dump(readdir($h)) . "<br>";
closedir($h);