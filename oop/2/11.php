<?php

spl_autoload_register('lib_autoloader');

function lib_autoloader($class_name)
{
    $path = 'lib' . DIRECTORY_SEPARATOR . $class_name . '.php';
    if (is_file($path)) {
        include $path;
    }
}

spl_autoload_register(function ($class_name) {
    $path = 'class' . DIRECTORY_SEPARATOR . $class_name . '.php';
    if (is_file($path)) {
        include $path;
    }
});

$obj1  = new MyClass1();
$obj2 = new MyClass2();
$obj3 = new MyLib1();
$obj4 = new MyLib2();// fatal error