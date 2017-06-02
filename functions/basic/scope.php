<?php

function test_global()
{
    global $a;
    $a = 555;

    $GLOBALS['b'] = 444;
}

test_global();

echo $a . '__' . $b;
print "<pre>";
print_r($GLOBALS);
print "</pre>";