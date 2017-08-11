<?php

namespace Advanced\Patterns\Builder;

require_once '../../autoload.php';

$director = new Director();

$truck = $director->build(new TruckBuilder());

$car = $director->build(new CarBuilder());


echo '<pre>';
print_r($truck);
echo '<hr>';
print_r($car);