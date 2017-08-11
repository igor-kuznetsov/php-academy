<?php

namespace Advanced\Patterns\Builder\Parts;

/**
 * Class Vehicle
 * @package Advanced\Patterns\Builder\Parts
 */
abstract class Vehicle
{
    /**
     * @var object[]
     */
    private $data = [];

    /**
     * @param string $key
     * @param object $value
     */
    public function setPart($key, $value)
    {
        $this->data[$key] = $value;
    }
}