<?php

namespace PhpAcademy\Oop\Lesson2\Ex18;

/**
 * Class TestTrait
 * @package PhpAcademy\Oop\Lesson2\Ex18
 */
trait TestTrait
{
    public $test = 5;
    public $something;

    public function test()
    {
        echo $this->test;
    }
}

/**
 * Class TestRightClass
 * @package PhpAcademy\Oop\Lesson2\Ex18
 */
class TestRightClass
{
    use TestTrait;

    public $test = 5;
    public $something;
}

/**
 * Class TestWrongClass
 * @package PhpAcademy\Oop\Lesson2\Ex18
 */
class TestWrongClass
{
    use TestTrait;

    public $test = 'test';
    private $something;
}