<?php

namespace PhpAcademy\Oop\Lesson2\Ex23;

/**
 * Class Registry
 * @package PhpAcademy\Oop\Lesson2\Ex23
 */
class Registry
{
    private static $instance = null;
    private $registry = [];

    private function __clone() {}
    private function __wakeup() {}
    private function __construct() {}

    public static function getInstance()
    {
        if (null == self::$instance) {
            self::$instance = new Registry();
        }

        return self::$instance;
    }

    public function set($key, $value)
    {
        $key = (string) $key;

        if (!isset($this->registry[$key])) {
            $this->registry[$key] = $value;
        }
    }

    public function get($key)
    {
        $key = (string) $key;

        return isset($this->registry[$key]) ? $this->registry[$key] : null;
    }
}

/**
 * Class Database
 * @package PhpAcademy\Oop\Lesson2\Ex23
 */
class Database
{
    public $connection = 'db_connection';
}

/**
 * Class Application
 * @package PhpAcademy\Oop\Lesson2\Ex23
 */
class Application
{
    //
}

$registry = Registry::getInstance();
$registry->set('database', new Database());
$registry->set('application', new Application());
$db = $registry->get('database');
var_dump($db);