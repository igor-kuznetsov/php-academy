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

//TODO: add concrete child class