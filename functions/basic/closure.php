<?php

$arr = ['a' => 1, 'b' => 2, 'c' => 4];
print "<pre>";
print_r(array_filter($arr, function($k) {
    return $k == 'b';
}, ARRAY_FILTER_USE_KEY));
print "</pre>";
echo "<hr>";

$x = 111;
$my_function = function ($a, $b) use ($x)
{
    echo $a + $b + $x;
};

$my_function(3, 6);

//var_dump($my_function);
$c = 10;

function test()
{
    $b = 5;
    $aaa = function () use ($b)
    {
        //
    };

    $aaa();
}

$prefix = 'is_';
$function_name = $prefix . gettype($c);