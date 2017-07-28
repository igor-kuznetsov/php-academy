<?php

namespace lessons\oop\solid\dip;

/**
 * Class PasswordReminder
 * @package lessons\oop\solid\dip
 */
class PasswordReminder
{
    private $dbConnection;

    public function __construct(DbConnectionInterface $dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }
}

/**
 * Class MySqlConnection
 * @package lessons\oop\solid\dip
 */
class MySqlConnection implements DbConnectionInterface
{
    //
}

interface DbConnectionInterface
{
     //
}