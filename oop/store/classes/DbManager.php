<?php

/**
 * Class DbManager
 */
class DbManager
{
    private static $instance = null;
    private $pdo;

    private function __clone() {}
    private function __wakeup() {}

    /**
     * @param string $host
     * @param string $name
     * @param string $user
     * @param string $pass
     */
    private function __construct($host, $name, $user, $pass)
    {
        try {
            $this->pdo = new PDO(
                'mysql:host=' . $host . ';dbname=' . $name,
                $user,
                $pass
            );
        } catch (PDOException $e) {
            die("PDO Exception: " . $e->getMessage() . "<br/>");
        } catch (Exception $e) {
            die("Exception: " . $e->getMessage() . "<br/>");
        }
    }

    /**
     * @return null|DbManager
     */
    public static function getInstance()
    {
        if (null === self::$instance) {
            self::$instance = new DbManager(DB_HOST, DB_NAME, DB_USER, DB_PASS);
        }

        return self::$instance;
    }

    /**
     * @return PDO
     */
    public function getPdo()
    {
        return $this->pdo;
    }
}
