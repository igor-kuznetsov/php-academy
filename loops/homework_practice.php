<?php

// #1
$extensions = ['html', 'css', 'php', 'js', 'jq'];
foreach ($extensions as $extension) {
    echo $extension . "<br>";
}

// #2
$elements = [1, 20, 15, 17, 24, 35];
$result = 0;
foreach ($elements as $element) {
    $result += $element;
}
echo $result . "<br>";

// #3
$elements = [26, 17, 136, 12, 79, 15];
$result = 0;
foreach ($elements as $element) {
    $result += $element ** 2;
}
echo $result . "<br>";

// #4
$arr = [
    'green' => 'зеленый',
    'red' => 'красный',
    'blue' => 'голубой'
];
foreach ($arr as $key => $val) {
    echo $key . "<br>";
}
foreach ($arr as $val) {
    echo $val . "<br>";
}

// #5
$arr = [
    'Коля' => 200,
    'Вася' => 300,
    'Петя' => 400
];
foreach ($arr as $name => $salary) {
    echo "$name — зарплата $salary долларов.<br>";
}

// #6
$arr = array(
    'green' => 'зеленый',
    'red'=>'красный',
    'blue'=>'голубой'
);
foreach ($arr as $key => $val) {
    $en[] = $key;
    $ru[] = $val;
}
print "<pre>";
print_r($en);
print_r($ru);
print "</pre>";

// #7
$arr = [2, 5, 9, 15, 0, 4];
foreach ($arr as $val) {
    if ($val > 3 && $val < 10) {
        echo $val . "<br>";
    }
}