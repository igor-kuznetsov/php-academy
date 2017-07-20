<?php

namespace PhpAcademy\Oop\Lesson2\Ex17;

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
 * Trait HelloWorld
 * @package PhpAcademy\Oop\Lesson2\Ex17
 */
trait HelloWorld
{
    use Hello, World;
}

/**
 * Class Test
 * @package PhpAcademy\Oop\Lesson2\Ex17
 */
class Test
{
    use HelloWorld;

    public function doNothing()
    {
        //
    }
}

$obj = new Test();
$obj->printHello();
$obj->printWorld();