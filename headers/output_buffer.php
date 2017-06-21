<?php

ob_start(); // start OB

echo 'Some text that should be outputted.';
echo '++++++';

$some_text = ob_get_contents(); // get content from OB

echo '--------';

$other_text = ob_get_contents();

// call header
// start session

ob_end_clean(); // end and clean OB

echo $some_text;
echo '<hr>';
echo $other_text;

ob_start();
print_r($_SESSION);
$temp = ob_get_contents();
file_put_contents('log.txt', $temp);
ob_end_clean();