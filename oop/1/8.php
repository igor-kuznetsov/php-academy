<?php

/**
 * Class TestMagic
 */
class TestMagic
{
    public $test = 'test';
    public $magic = 'magic';
    private $methods;

    function __clone()
    {
        echo 'our class was cloned';
        echo '<hr>';
    }

    function __sleep()
    {
        return ['test'];
    }

    function __wakeup()
    {
        echo 'our class was unserialized';
        echo '<hr>';
    }

    function __toString()
    {
        return 'object converted to this string';
    }

    function __invoke($someArgument, $anotherArgument)
    {
        var_dump($someArgument);
        echo '<hr>';
        var_dump($anotherArgument);
        echo '<hr>';
    }

    function __debugInfo()
    {
        return [
            'fakeProperty' => 'fake value'
        ];
    }
}

$obj = new TestMagic();

$objClone = clone $obj; // __clone

$serializedObj = serialize($obj); // __sleep

var_dump($serializedObj);
echo '<hr>';

unserialize($serializedObj); // __wakeup

echo $obj; // __toString
echo '<hr>';

$obj(10, 'test_text'); // __invoke

var_dump($obj); // __debugInfo
echo '<hr>';

print "<pre>";
print_r($obj); // __debugInfo
print "</pre>";
