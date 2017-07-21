<?php

/**
 * Class AbstractBase
 */
abstract class AbstractBase
{
    abstract public function someMethod();
}

/**
 * Class AbstractChild
 */
abstract class AbstractChild extends AbstractBase
{
    public function childMethod()
    {
        echo 'this is concrete method';
    }
}

class TestConcreteClass2 extends AbstractChild
{
    public function someMethod()
    {
        // TODO: Implement someMethod() method.
    }
}