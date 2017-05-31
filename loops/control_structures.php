<?php

$i = 0;

while (true) {
    $i++;
    if ($i > 5) {
        break;
    }
    echo $i . "<br>";
}

echo "<hr>";

$k = 0;
while ($k < 5) {
    $k++;
    if ($k == 3) {
        continue;
    }
    echo $k . "<br>";
}

echo "<br>";

$j = 0;
while ($j < 5) {
    $j++;
    if ($j == 4) {
        die('This program has been stopped because $j = 4.');
    }
    echo $j . "<br>";
}