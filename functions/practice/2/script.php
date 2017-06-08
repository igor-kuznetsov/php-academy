<?php

/**
 * @param string $string
 * @return array
 */
function top3(string $string):array
{
    $array = explode(' ', $string);
    usort($array, function($a, $b) {
        $length_a = strlen($a);
        $length_b = strlen($b);

        if ($length_a < $length_b) {
            return 1;
        } elseif ($length_a == $length_b) {
            return 0;
        } else {
            return -1;
        }
    });

    return array_slice($array, 0, 3);
}

var_dump(top3($_POST['text']));