<?php

namespace Advanced\SOAP\Server;

use Exception;
use mysqli;

/**
 * Class MySoapServer
 * @package Advanced\SOAP\Server
 */
class MySoapServer
{
    private $db;

    /**
     * MySoapServer constructor.
     */
    public function __construct()
    {
        $this->db = new mysqli(
            'localhost',
            'root',
            '',
            'classicmodels'
        );

        if ($this->db->connect_errno) {
            throw new Exception($this->db->connect_error);
        }
    }

    private function query($sql)
    {
        $result = $this->db->query($sql);

        if ($this->db->errno) {
            throw new Exception($this->db->error);
        }

        if (is_bool($result)) {
            return $result;
        }

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }

    public function getProductName($code)
    {
        $code = $this->db->real_escape_string($code);
        $sql = "SELECT `productName` 
                FROM `products` 
                WHERE `productCode` = '$code' 
                LIMIT 1;";
        $result = $this->query($sql);

        return $result[0]['productName'] ?? '';
    }
}