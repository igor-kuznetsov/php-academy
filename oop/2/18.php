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

    private function test()
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

    public function test2()
    {
        $this->test();
    }

//    public $test = 5;
//    public $something;
}

$obj = new TestRightClass();
$obj->test2();