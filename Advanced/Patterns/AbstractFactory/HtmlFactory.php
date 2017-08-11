<?php

namespace Advanced\Patterns\AbstractFactory;

/**
 * Class HtmlFactory
 * @package Advanced\Patterns\AbstractFactory
 */
class HtmlFactory extends AbstractFactory
{
    public function createText($content): AbstractText
    {
        return new HtmlText($content);
    }
}
