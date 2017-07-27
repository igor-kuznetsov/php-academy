<?php

/**
 * Class DbManager
 */
class DbManager
{
    private static $instance = null;
    private $pdo;
    private $name;

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
            $this->name = md5(time());
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
     * @param string $query
     * @return PDOStatement
     */
    public function query($query)
    {
        try {
            $this->logQuery($query);

            return $this->pdo->query($query);
        } catch (PDOException $e) {
            die("PDO Exception: " . $e->getMessage() . "<br/>");
        } catch (Exception $e) {
            die("Exception: " . $e->getMessage() . "<br/>");
        }
    }

    /**
     * @param string $query
     * @return PDOStatement
     */
    public function prepare($query)
    {
        try {
            $this->logQuery($query);

            return $this->pdo->prepare($query);
        } catch (PDOException $e) {
            die("PDO Exception: " . $e->getMessage() . "<br/>");
        } catch (Exception $e) {
            die("Exception: " . $e->getMessage() . "<br/>");
        }
    }

    /**
     * @param string $query
     */
    private function logQuery($query)
    {
        $file = dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'log.txt';
        $content = 'CONNECTION: ' . $this->name . PHP_EOL;
        $content .= 'QUERY: ' . $query . PHP_EOL;
        $content .= 'DATETIME: ' . date('d/m/Y H:i:s') . PHP_EOL;
        $content .= PHP_EOL;
        file_put_contents($file, $content, FILE_APPEND);
    }
}
