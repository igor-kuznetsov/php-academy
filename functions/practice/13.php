<?php

$string = 'яблоко черешня вишня вишня черешня груша яблоко черешня вишня яблоко вишня вишня черешня груша яблоко черешня черешня вишня яблоко вишня вишня черешня вишня черешня груша яблоко черешня черешня вишня яблоко вишня вишня черешня черешня груша яблоко черешня вишня';

function fruit_count($string)
{
    $array = explode(' ', $string);
    $count_values = array_count_values($array);
    arsort($count_values);
    foreach ($count_values as $key => $value) {
        echo "$key - $value<br>";
    }
}

fruit_count($string);