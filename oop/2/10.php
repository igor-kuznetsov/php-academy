<?php

/**
 * Class TestFinalMethod
 */
class TestFinalMethod
{
    public $someProperty;

    public function someFunction()
    {
        echo 'some method';
    }

    final public function testFinalFunction()
    {
        echo 'this method cannot be overridden';
    }
}

/**
 * Class TestFinalMethodChild
 */
class TestFinalMethodChild extends TestFinalMethod
{
    protected $anotherProperty;

    public function someFunction()
    {
        echo 'someFunction is overridden';
    }

    public function testFinalFunction()
    {
        // fatal error
    }
}