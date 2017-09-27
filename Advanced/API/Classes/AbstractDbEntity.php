<?php

namespace Advanced\API\Classes;

use Exception;
use mysqli;

abstract class AbstractDbEntity
{
    protected $db;

    public function __construct(mysqli $db)
    {
        $this->db = $db;
    }

    abstract public function create();
    abstract public function read();
    abstract public function update();
    abstract public function delete();

    protected function query($sql)
    {
        if (!$this->db) {
            return false;
        }

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

    protected function escape($string)
    {
        return $this->db->real_escape_string($string);
    }
}