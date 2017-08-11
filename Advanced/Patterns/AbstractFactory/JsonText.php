<?php

namespace Advanced\Patterns\AbstractFactory;

/**
 * Class JsonText
 * @package Advanced\Patterns\AbstractFactory
 */
class JsonText extends AbstractText
{
    public function getText()
    {
        return json_encode(['text' => $this->text]);
    }
}
