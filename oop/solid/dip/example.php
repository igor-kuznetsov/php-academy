<?php

namespace lessons\oop\solid\dip;

/**
 * Class PasswordReminder
 * @package lessons\oop\solid\dip
 */
class PasswordReminder
{
    private $dbConnection;

    public function __construct(MySqlConnection $dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }
}

/**
 * Class MySqlConnection
 * @package lessons\oop\solid\dip
 */
class MySqlConnection
{
    //
}

// TODO: add DbConnectionInterface
// TODO: MySQLConnection implements DbConnectionInterface