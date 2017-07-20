<?php

namespace PhpAcademy\Oop\Lesson2\Inc;

const MY_LONG_CONST = 10;

/**
 * @param $value
 */
function my_debug($value)
{
    echo "<pre>";
    if (is_array($value) || is_object($value)) {
        print_r($value);
    } else {
        var_dump($value);
    }
    echo "</pre>";
}