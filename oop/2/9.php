<?php

/**
 * Class TestFinalClass
 */
final class TestFinalClass
{
    public $someProperty;

    public function someMethod()
    {
        echo 'some method';
    }
}

/**
 * Class TestFinalClassChild
 */
class TestFinalClassChild extends TestFinalClass
{
    //fatal error
}