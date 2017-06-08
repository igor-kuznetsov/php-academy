<?php

/**
 * @param string $text
 * @return array
 */
function unique_words(string $text):array
{
    $array = explode(' ', $text);

    $count_values = array_count_values($array);

    foreach ($array as $key => $value) {
        if ($count_values[$value] > 1) {
            unset($array[$key]);
        }
    }

    return $array;
}

var_dump(unique_words($_POST['text']));