<?php

namespace PhpAcademy\Oop\Lesson3\Ex1;

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
    }

    private function somePrivateMethod()
    {
        echo 'private';
    }
}

$obj = new Test();

echo '<h3>class_exists</h3>';
var_dump(class_exists('Test'));
echo '<hr>';
var_dump(class_exists('MyClass'));

echo '<h3>method_exists</h3>';
var_dump(method_exists('Test', 'someMethod'));
echo '<hr>';
var_dump(method_exists('Test', 'somePrivateMethod'));
echo '<hr>';
var_dump(method_exists('Test', 'testMethod'));
echo '<hr>';
var_dump(method_exists('MyClass', 'someMethod'));
echo '<hr>';
var_dump(method_exists($obj, 'someMethod'));

echo '<h3>property_exists</h3>';
var_dump(property_exists('Test', 'someProperty'));
echo '<hr>';
var_dump(property_exists('Test', 'somePrivateProperty'));
echo '<hr>';
var_dump(property_exists('Test', 'testProperty'));
echo '<hr>';
var_dump(property_exists('MyClass', 'someProperty'));
echo '<hr>';
var_dump(property_exists(new Test(), 'someProperty'));

echo '<h3>get_class</h3>';
echo get_class($obj);
echo '<hr>';
$obj->someMethod();