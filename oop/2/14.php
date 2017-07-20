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

    // TODO: override printHello() method

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

// TODO: add child class
// TODO: override printWorld() and printExclamation() methods