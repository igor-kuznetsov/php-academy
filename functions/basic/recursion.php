<?php


function test(int $a)
{
    echo $a;
    $a--;
    if ($a > 0) {
        test($a);
    }
}

test(9);

echo "<hr>";

$arr = [34, 56, 78, 0, [5, 7, 8, [56, 78, 90]]];

echo count_r($arr);

function count_r($array, $count = 0)
{
    foreach ($array as $value) {
        ++$count;
        if (is_array($value)) {
            $count = count_r($value, $count);
        }
    }

    return $count;
}
echo "<hr>";

function my_print_r(array $array)
{
    echo 'Array' . PHP_EOL;
    echo '(' . PHP_EOL;
    foreach ($array as $key => $value) {
        echo "[$key] => ";
        if (is_array($value)) {
            my_print_r($value);
        } else {
            echo $value . PHP_EOL;
        }
    }
    echo ')';
}
print "<pre>";
my_print_r($arr);
print "</pre>";