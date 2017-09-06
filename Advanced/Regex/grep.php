<?php

$pattern = '%(foo)(bar)(test)*%';
$input = [
    'foobar',
    'foo',
    'bar',
    'foobartest',
    'foobar 212',
    'test test',
    '412 foobartest',
    'test'
];

$result = preg_grep($pattern, $input);

echo '<pre>';
print_r($result);