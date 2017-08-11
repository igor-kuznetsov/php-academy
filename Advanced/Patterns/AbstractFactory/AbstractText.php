<?php

namespace Advanced\Patterns\AbstractFactory;

/**
 * Class AbstractText
 * @package Advanced\Patterns\AbstractFactory
 */
abstract class AbstractText
{
    /**
     * @var string
     */
    protected $text;

    public function __construct($text)
    {
        $this->text = $text;
    }

    abstract public function getText();
}
