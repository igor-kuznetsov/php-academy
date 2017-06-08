<?php

declare(strict_types = 1);

var_dump(getCommonWords($_POST['a'], $_POST['b']));

/**
 * @param string $a
 * @param string $b
 * @return array
 */
function getCommonWords(string $a, string $b):array
{
    $array_a = explode(' ', $a);
    $array_b = explode(' ', $b);

    return array_intersect($array_a, $array_b); //array_diff()
}