<?php

namespace PhpAcademy\Oop\Lesson3\Ex3;

/**
 * Class Singleton
 * @package PhpAcademy\Oop\Lesson2\Ex21
 */
class Singleton
{
    private static $instance = null;
    private $created;

    private function __clone() {}
    private function __wakeup() {}

    private function __construct()
    {
        $this->created = date('d/m/Y H:i:s');
    }

    public static function getInstance()
    {
        if (null === self::$instance) {
            self::$instance = new Singleton();
        }

        return self::$instance;
    }

    public function getCreated()
    {
        return $this->created;
    }
}

$obj1 = Singleton::getInstance();
echo $obj1->getCreated();
echo '<hr>';

sleep(2);

$obj2 = Singleton::getInstance();
echo $obj2->getCreated();
echo '<hr>';

sleep(2);

$obj3 = Singleton::getInstance();
echo $obj3->getCreated();
echo '<hr>';