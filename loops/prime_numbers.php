<?php

define('LIMIT', 40);
define('SQRT_LIMIT', floor(sqrt(LIMIT)));

$prime_numbers = array_fill(2, LIMIT - 1, true);

for ($i = 2; $i <= SQRT_LIMIT; $i++) {
    if ($prime_numbers[$i] === true) {
        for ($j = $i + $i; $j <= LIMIT; $j += $i) {
            $prime_numbers[$j] = false;
        }
    }
//    print '<pre>';
//    print_r($prime_numbers);
//    print '</pre>';
}

echo implode(' ', array_keys(array_filter($prime_numbers)));

