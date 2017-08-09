<?php

class Page extends Model
{
    public function getList()
    {
        $sql = "SELECT * FROM `pages`;";

        return $this->db->query($sql);
    }

    public function getByAlias($alias)
    {
        $alias = $this->db->escape($alias);
        $sql = "SELECT * FROM `pages` WHERE `alias` = '$alias' LIMIT 1;";
        $result = $this->db->query($sql);

        return isset($result[0]) ? $result[0] : null;
    }
}