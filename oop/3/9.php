<?php

namespace PhpAcademy\Oop\Lesson3\Ex9;

/**
 * Class Something
 * @package PhpAcademy\Oop\Lesson3\Ex9
 */
class Something
{
    // some properties and methods
    public function doSomething()
    {
        //
    }
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
        $this->interface->test();
    }

    /**
     * @param Something $something
     */
    public function doSomething(Something $something)
    {
        // do something with $something
        $something->doSomething();
        $this->interface->test();
    }
}


$obj = new Example(new Test);

$obj->doSomething(new Something());

/**
 * @param TestInterface $int
 */
function my_test(TestInterface $int)
{
    echo get_class($int);
}

my_test(new Test);
my_test(10); // fatal error