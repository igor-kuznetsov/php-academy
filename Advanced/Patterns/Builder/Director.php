<?php

namespace Advanced\Patterns\Builder;

use Advanced\Patterns\Builder\Parts\Vehicle;

/**
 * Class Director
 * @package Advanced\Patterns\Builder
 */
class Director
{
    public function build(BuilderInterface $builder): Vehicle
    {
        $builder->createVehicle();
        $builder->addDoors();
        $builder->addEngine();
        $builder->addWheel();

        return $builder->getVehicle();
    }
}
