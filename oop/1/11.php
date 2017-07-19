<?php

/**
 * Class TestStaticMethods
 */
class TestStaticMethods
{
    private $value;

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }


    public static function outputClassName()
    {
        echo __CLASS__;
    }

    public static function outputValue()
    {
        echo $this->value;
    }

    public static function staticSetValue()
    {
        $this->setValue(200);
    }
}

TestStaticMethods::outputClassName();
echo '<hr>';
TestStaticMethods::outputValue();