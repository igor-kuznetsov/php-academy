<?php

namespace PhpAcademy\Oop\Lesson2\Ex13;

spl_autoload_register(function ($class_name) {
    $parts = explode("\\", $class_name);
    $class_path = 'inc' . DIRECTORY_SEPARATOR . end($parts) . '.php';

    if (is_file($class_path)) {
        include $class_path;
    }
}); // autoload classes

include "inc" . DIRECTORY_SEPARATOR . "functions.php"; // we cannot autoload simple php file

use PhpAcademy\Oop\Lesson2\Inc\MyLongNameClass1 as MyClass; // class full import with alias
use PhpAcademy\Oop\Lesson2\Inc\MyClass2; // class short import
use PhpAcademy\Oop\Lesson2\Inc\MyInterface; // import interface
use function PhpAcademy\Oop\Lesson2\Inc\my_debug as debug; // import function (PHP5.6+)
use const PhpAcademy\Oop\Lesson2\Inc\MY_LONG_CONST as MY_CONST; // import constant (PHP5.6+)


$obj1 = new MyClass();
$obj2 = new MyClass2();

/**
 * Class NewTest
 * @package PhpAcademy\Oop\Lesson2\Ex13
 */
class NewTest implements MyInterface
{
    public $someProperty = 555;

    public function test()
    {
        echo 'test text';
    }
}

echo 'MY_CONST = ' . MY_CONST;

$obj3 = new NewTest();
debug($obj3);