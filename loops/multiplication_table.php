<?php

$nums = [1, 2, 3, 4, 5, 6, 7, 8, 9];

echo '<table border="1" cellpadding="10" cellspacing="1">';
echo '<tr>';
foreach ($nums as $i) {
    foreach ($nums as $j) {
        echo '<td align="center" valign="middle">';
        echo $i * $j;
        echo '</td>';
    }

    if ($i != 9) {
        echo '</tr>';
        echo '<tr>';
    }
}
echo '</tr>';
echo '</table>';
