<?php

namespace PhpAcademy\Oop\Lesson3\Ex9;

/**
 * Class Something
 * @package PhpAcademy\Oop\Lesson3\Ex9
 */
class Something
{
    // some properties and methods
}

/**
 * Interface TestInterface
 * @package PhpAcademy\Oop\Lesson3\Ex9
 */
interface TestInterface
{
    public function test();
}

/**
 * Class Test
 * @package PhpAcademy\Oop\Lesson3\Ex9
 */
class Test implements TestInterface
{
    public function test()
    {
        // test
    }
}

/**
 * Class Example
 * @package PhpAcademy\Oop\Lesson3\Ex9
 */
class Example
{
    private $interface;

    /**
     * @param TestInterface $interface
     */
    function __construct(TestInterface $interface)
    {
        $this->interface = $interface;
    }

    /**
     * @param Something $something
     */
    public function doSomething(Something $something)
    {
        // do something with $something
    }
}


$obj = new Example(new Test);

$obj->doSomething(new Something());