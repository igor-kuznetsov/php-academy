<?php

$my_array = [12, 45, 67, 23, 89];

foreach ($my_array as $array_element) {
    echo $array_element . "<br>";
}

echo "<hr>";

$assoc_array = [
    'a' => 56,
    'bb' => 'some text',
    'c' => 78,
    'dd' => 123
];

foreach ($assoc_array as $element_key => $element_value) {
    echo $element_key . ' &rarr; ' . $element_value . "<br>";
}

echo "<hr>";

$arr = [1, 2, 3, 4];

foreach ($arr as &$value) {
    $value *= 2;
}
unset($value);

print "<pre>";
print_r($arr);
print "</pre>";