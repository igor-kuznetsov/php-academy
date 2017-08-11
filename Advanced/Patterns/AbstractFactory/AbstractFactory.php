<?php

namespace Advanced\Patterns\AbstractFactory;

/**
 * Class AbstractFactory
 * @package Advanced\Patterns\AbstractFactory
 */
abstract class AbstractFactory
{
    abstract public function createText($content): AbstractText;
}