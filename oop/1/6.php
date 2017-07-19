<?php

/**
 * Class TestConstructor
 */
class TestConstructor
{
    public function __construct()
    {
        echo 'class constructor has been called';
        echo '<hr>';
    }
}

$obj1 = new TestConstructor();
$obj2 = new TestConstructor();

$obj3 = clone $obj1;

echo 'some text goes here....';
echo '<hr>';

/**
 * Class TestPrivateConstructor
 */
class TestPrivateConstructor
{
    private function __construct()
    {
        echo 'class private constructor has been called';
        echo '<hr>';
    }
}

//$obj4 = new TestPrivateConstructor();