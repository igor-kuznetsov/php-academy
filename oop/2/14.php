<?php

namespace PhpAcademy\Oop\Lesson2\Ex14;

/**
 * Trait Hello
 * @package PhpAcademy\Oop\Lesson2\Ex14
 */
trait Hello
{
    public function printHello()
    {
        echo 'Hello ';
    }
}

/**
 * Trait World
 * @package PhpAcademy\Oop\Lesson2\Ex14
 */
trait World
{
    public function printWorld()
    {
        echo 'World';
    }
}

/**
 * Class MyHelloWorld
 * @package PhpAcademy\Oop\Lesson2\Ex14
 */
class MyHelloWorld
{
    use Hello, World;

    public function printHello()
    {
        echo 'HELLO';
    }

    public function printExclamation()
    {
        echo '!';
    }
}

$obj = new MyHelloWorld();
$obj->printHello();
$obj->printWorld();
$obj->printExclamation();

echo '<hr>';

class Child extends MyHelloWorld
{
    public function printHello()
    {
        echo '+++';
    }
}

$child = new Child();
$child->printHello();
$child->printWorld();
$child->printExclamation();