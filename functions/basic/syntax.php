<?php

my_function();

function my_function()
{
    echo __FUNCTION__;
}
echo "<hr>";
//$name = 'test';
//$$name = 10;
//echo $test;

$function = 'test';

function test()
{
    echo 'test';
}

$function();

function getSomething()
{
    return [];
}

function setNumber($x)
{
    return $x;
}

function outputTExt()
{
    echo '';
}

function isMyAccount()
{
    return true;
}