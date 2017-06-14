<?php

var_dump(is_dir('test_dir'));
var_dump(is_dir('test_file.txt'));
echo '<hr>';
echo getcwd();
echo '<hr>';
chdir('../files');
echo getcwd();