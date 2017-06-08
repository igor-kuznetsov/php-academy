<?php

function my_static($reset = false)
{
    static $count = 0;
    if ($reset) {
        $count = 0;
    }
    echo $count;
    $count++;
    if ($count < 5) {
        my_static();
    }
}

my_static();
my_static(true);