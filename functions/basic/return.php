<?php
declare(strict_types = 1);

function a(): float
{
    //echo 'fgfg';

    $a = 50;
    var_dump($a);
    $b = 40;

    return $a;
}
$b = a();
var_dump($b);