<?php

declare(strict_types = 0);

$a = 5;

/**
 * @param int $a
 * @param bool $b
 * @param int $c
 */
function my_function(&$a, bool $b, int $c)
{
    $a = 10;
    echo $a . "<br>";
    echo $b . "<br>";
    echo $c . "<br>";
}
my_function($a, 3, 9);
$a = 30;
echo $a;
echo "<hr>";

function sum()
{
    //$arr = func_get_args();
    //$b = func_get_arg(1);
    echo func_num_args();
}

sum(4, 6, 8);
echo "<hr>";
function summa($a, ...$numbers)
{
    echo $a;
    var_dump($numbers);
}

summa('ffffff', 1, 2, 3, 4);

/*
$arr = [];

foreach ($arr as $key => $val) {
    $a = do_something($key, $val);
    aa($a);
}
*/