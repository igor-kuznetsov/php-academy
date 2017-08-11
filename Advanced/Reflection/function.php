<?php

$refFunc = new ReflectionFunction('str_replace');
$params = [];
foreach($refFunc->getParameters() as $param) {
    $params[(int) $param->getPosition()] = [
        'name' => '$' . $param->getName(),
        'is_optional' => (int) $param->isOptional(),
        'has_default' => (int) $param->isDefaultValueAvailable(),
        'default' => $param->isDefaultValueAvailable() ? $param->getDefaultValue() : null
    ];
}

echo '<pre>';
print_r($params);

function my_test($a, $b = 10) {}