<?php

namespace PhpAcademy\Oop\Lesson3\Ex4;

/**
 * Class DbConnection
 * @package PhpAcademy\Oop\Lesson2\Ex22
 */
class DbConnection
{
    const DB_HOST = 'localhost';
    const DB_USER = 'root';
    const DB_PASS = '';
    const DB_NAME = 'classicmodels';

    private static $instance = 'empty';
    private $connection;

    private function __clone() {}
    private function __wakeup() {}

    private function __construct()
    {
        $this->connection = mysqli_connect(
            self::DB_HOST,
            self::DB_USER,
            self::DB_PASS,
            self::DB_NAME
        );
    }

    public static function getInstance()
    {
        if ('empty' === self::$instance) {
            self::$instance = new DbConnection();
        }

        return self::$instance;
    }

    public function getResults($query)
    {
        $result = [];

        if ($query_result = mysqli_query($this->connection, $query)) {

            while ($row = mysqli_fetch_assoc($query_result)) {
                $result[] = $row;
            }

            mysqli_free_result($query_result);
        }

        return $result;
    }
}

$db = DbConnection::getInstance();
$results = $db->getResults("SELECT * FROM `products` LIMIT 3;");

print "<pre>";
print_r($results);
print "</pre>";