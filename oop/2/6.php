<?php

/**
 * Interface TestInterface
 */
interface TestInterface
{
    public function testInterfaceMethod();
    protected function testInterfaceProtectedMethod();
    private function testInterfacePrivateMethod();
}

$obj = new TestInterface();