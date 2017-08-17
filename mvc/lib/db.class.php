<?php

class DB
{
    protected $mysqli;

    /**
     * DB constructor.
     * @param $host
     * @param $user
     * @param $pass
     * @param $name
     * @throws Exception
     */
    public function __construct($host, $user, $pass, $name)
    {
        $this->mysqli = new mysqli($host, $user, $pass, $name);

        if ($this->mysqli->connect_errno) {
            throw new Exception($this->mysqli->connect_error);
        }
    }

    /**
     * @param string $sql
     * @return array|bool
     * @throws Exception
     */
    public function query($sql)
    {
        if (!$this->mysqli) {
            return false;
        }

        $result = $this->mysqli->query($sql);

        if ($this->mysqli->errno) {
            throw new Exception($this->mysqli->error);
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

    public function escape($string)
    {
        return $this->mysqli->real_escape_string($string);
    }
}