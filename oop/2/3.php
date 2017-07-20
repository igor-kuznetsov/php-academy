<?php

/**
 * Class TestAbstractClass
 */
abstract class TestAbstractClass
{
    private $var;

    public function getVar()
    {
        return $this->var;
    }

    public function setVar($value)
    {
        $this->var = $value;
    }
}

$obj1 = new TestAbstractClass();

/**
 * Class TestConcreteClass
 */
class TestConcreteClass extends TestAbstractClass
{
    public $test;
}

$obj2 = new TestConcreteClass();
$obj2->test = 'test string';
$obj2->setVar(10);

print "<pre>";
print_r($obj2);
print "</pre>";