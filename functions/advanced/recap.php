<?php

declare(strict_types = 1);

test('hhhhh', [1, 4, 6]);

function test($string, $optional = [])
{
    echo $string;
    echo __FUNCTION__;
}

test('rererer');

$test = 'test';

$test();

$a = function() {
    echo 'anonym';
};
$b = 10;
$a();

array_filter([], function() use ($b) {
    return true;
});

function test2 (int $a, string $b, ...$c):array
{
    global $c;
    echo $a;
    echo $b;
    $c = 5;

    return [$c, $a, $b];
}

echo $c;

$result = test2(2, 'fff', 65, 67, 'fgfg');

echo $result[1];
echo test2(2, 'fff', 65, 67, 'fgfg')[1];