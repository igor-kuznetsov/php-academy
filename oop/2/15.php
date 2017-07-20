<?php

namespace PhpAcademy\Oop\Lesson2\Ex15;

/**
 * Trait FirstTrait
 * @package PhpAcademy\Oop\Lesson2\Ex15
 */
trait FirstTrait
{
    public function test()
    {
        echo 'test 1';
    }
}

/**
 * Trait SecondTrait
 * @package PhpAcademy\Oop\Lesson2\Ex15
 */
trait SecondTrait
{
    public function test()
    {
        echo 'test 2';
    }
}

/**
 * Class Test
 * @package PhpAcademy\Oop\Lesson2\Ex15
 */
class Test
{
    use FirstTrait, SecondTrait;
}