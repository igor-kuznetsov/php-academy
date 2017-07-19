<?php

/**
 * Class TestDestructor
 */
class TestDestructor
{
    private $name;

    function __construct(string $name)
    {
        $this->name = $name;
    }

    public function __destruct()
    {
        echo "$this->name destructor has been called";
        echo '<hr>';
    }
}

$obj1 = new TestDestructor('obj1');
$obj2 = new TestDestructor('obj2');

echo 'some text goes here....';
echo '<hr>';

unset($obj2);

echo 'other text goes here after unset obj2';
echo '<hr>';