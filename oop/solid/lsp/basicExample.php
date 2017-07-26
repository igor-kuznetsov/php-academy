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
}

/**
 * Class C
 * @package lessons\oop\solid\lsp
 */
class C
{
    /**
     * @param B $obj
     */
    public function doSomething(B $obj)
    {
        $obj->test();
    }
}