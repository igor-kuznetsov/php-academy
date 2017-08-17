<?php

namespace lessons\oop\solid\lsp;

/**
 * Class A
 * @package lessons\oop\solid\lsp
 */
class A
{
    public function test()
    {
        //
    }
}

/**
 * Class B
 * @package lessons\oop\solid\lsp
 */
class B extends A
{
    public function test()
    {
        //
    }

    public function alpha()
    {
        //
    }
}

/**
 * Class C
 * @package lessons\oop\solid\lsp
 */
class C
{
    /**
     * @param mixed $obj
     */
    public function doSomething(A $obj)
    {
        $obj->test();
    }
}