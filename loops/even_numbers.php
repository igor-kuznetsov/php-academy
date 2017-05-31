<?php

define("LIMIT", 40);

$i = 1;
$even_numbers = array_fill($i, LIMIT, true);

while ($i <= LIMIT) {
    if ($i % 2 > 0) {
        $even_numbers[$i] = false;
    }
    $i++;
}

echo implode(' ', array_keys(array_filter($even_numbers)));

