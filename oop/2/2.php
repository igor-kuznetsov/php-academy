<?php

/**
 * Class TestOverloadingMethods
 */
class TestOverloadingMethods
{
    function __call($name, $arguments)
    {
        echo "Method '$name' called with arguments: " . implode(', ', $arguments);
    }

    public static function __callStatic($name, $arguments)
    {
        echo "Static method '$name' called with arguments: " . implode(', ', $arguments);
    }
}

$obj = new TestOverloadingMethods();
$obj->runTest(10, 'string value', 56, 67);
echo '<hr>';
$obj::runStaticTest(55, 'fgfgfgsdhs');