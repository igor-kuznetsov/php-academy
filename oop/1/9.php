<?php

/**
 * Class TestStaticProperties
 */
class TestStaticProperties
{
    public static $x;
    public $y;

    public function getX()
    {
        return TestStaticProperties::$x;
    }
}

TestStaticProperties::$x = 100;
echo TestStaticProperties::$x;
echo '<hr>';

//TestStaticProperties::getX();
$obj = new TestStaticProperties();
echo $obj->getX();
echo '<hr>';

//TestStaticProperties::$y = 200;
//$obj->x = 500;

/**
 * Class StaticCounter
 */
class StaticCounter
{
    public static $counter;

    public function __construct()
    {
        ++StaticCounter::$counter;
    }

    public function getCounter()
    {
        return StaticCounter::$counter;
    }
}

$obj1 = new StaticCounter();
echo $obj1->getCounter();
echo '<hr>';
$obj2 = new StaticCounter();
$obj3 = new StaticCounter();

echo $obj1->getCounter();