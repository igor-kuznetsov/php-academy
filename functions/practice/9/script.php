<?php

$string = $_POST['string'];

//echo strrev($string);

for ($s = '', $i = strlen($string) - 1; $i >= 0; $i--) {
    $s .= $string[$i];
}

echo $s;