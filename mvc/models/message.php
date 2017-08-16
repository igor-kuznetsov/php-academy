<?php

class Message extends Model
{
    public function save($data, $id = null)
    {
        $id = (int)$id;

        $name = $this->db->escape($data['name']);
        $email = $this->db->escape($data['email']);
        $message = $this->db->escape($data['message']);

        if (empty($id)) {
            $sql = "INSERT INTO `messages` (`name`, `email`, `message`) 
                    VALUES ('$name', '$email', '$message');";
        } else {
            $sql = "UPDATE `messages` 
                    SET `name` = '$name',
                    `email` = '$email',
                    `message` = '$message'
                    WHERE `id` = $id;";
        }

        return $this->db->query($sql);
    }

    public function getList()
    {
        $sql = "SELECT * FROM `messages`;";

        return $this->db->query($sql);
    }
}