<?php

namespace PhpAcademy\Oop\Lesson2\Ex12;

/**
 * Class MyLib1
 * @package PhpAcademy\Oop\Lesson2
 */
class MyLib1
{
    //TODO: comment out namespace declaration
    //TODO: add something before namespace declaration
    public static function getNamespace()
    {
        return __NAMESPACE__;
    }
}

echo MyLib1::getNamespace();