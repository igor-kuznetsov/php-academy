<?php

namespace Advanced\Patterns\AbstractFactory;

/**
 * Class JsonFactory
 * @package Advanced\Patterns\AbstractFactory
 */
class JsonFactory extends AbstractFactory
{
    public function createText($content): AbstractText
    {
        return new JsonText($content);
    }
}
