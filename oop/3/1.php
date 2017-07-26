<?php

namespace PhpAcademy\Oop\Lesson3\Ex1;

include "../2/lib/MyLib1.php";

use PhpAcademy\Oop\Lesson2\Lib\MyLib1;

/**
 * Class Test
 */
class Test
{
    public $someProperty;
    private $somePrivateProperty;

    public function someMethod()
    {
        echo get_class();
        //echo __CLASS__;
    }

    private function somePrivateMethod()
    {
        echo 'private';
    }
}

$obj = new Test();

echo '<h3>class_exists</h3>';
var_dump(class_exists('PhpAcademy\Oop\Lesson3\Ex1\Test'));
echo '<hr>';
var_dump(class_exists('MyLib1'));

echo '<h3>method_exists</h3>';
var_dump(method_exists('PhpAcademy\Oop\Lesson3\Ex1\Test', 'someMethod'));
echo '<hr>';
var_dump(method_exists('PhpAcademy\Oop\Lesson3\Ex1\Test', 'somePrivateMethod'));
echo '<hr>';
var_dump(method_exists('PhpAcademy\Oop\Lesson3\Ex1\Test', 'testMethod'));
echo '<hr>';
var_dump(method_exists('MyClass', 'someMethod'));
echo '<hr>';
var_dump(method_exists($obj, 'someMethod'));

echo '<h3>property_exists</h3>';
var_dump(property_exists('PhpAcademy\Oop\Lesson3\Ex1\Test', 'someProperty'));
echo '<hr>';
var_dump(property_exists('PhpAcademy\Oop\Lesson3\Ex1\Test', 'somePrivateProperty'));
echo '<hr>';
var_dump(property_exists('PhpAcademy\Oop\Lesson3\Ex1\Test', 'testProperty'));
echo '<hr>';
var_dump(property_exists('MyClass', 'someProperty'));
echo '<hr>';
var_dump(property_exists(new Test(), 'someProperty'));

echo '<h3>get_class</h3>';
echo get_class($obj);
echo '<hr>';
$obj->someMethod();