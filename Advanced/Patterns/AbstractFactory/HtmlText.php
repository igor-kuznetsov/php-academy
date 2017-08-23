<?php

namespace Advanced\Patterns\AbstractFactory;

/**
 * Class HtmlText
 * @package Advanced\Patterns\AbstractFactory
 */
class HtmlText extends AbstractText
{
    public function getText()
    {
        return '<b>'.$this->text.'</b>';
    }
}
