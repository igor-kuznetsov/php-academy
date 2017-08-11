<?php

namespace Advanced\Patterns\Builder;

use Advanced\Patterns\Builder\Parts\Vehicle;

/**
 * Interface BuilderInterface
 * @package Advanced\Patterns\Builder
 */
interface BuilderInterface
{
    public function createVehicle();

    public function addWheel();

    public function addEngine();

    public function addDoors();

    public function getVehicle(): Vehicle;
}