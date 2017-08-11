<?php

namespace Advanced\Patterns\Facade;

require_once '../../autoload.php';

$facade = new Facade(new PcBios(), new Linux());
$facade->turnOn();
$facade->turnOff();