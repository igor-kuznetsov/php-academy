<?php

namespace Advanced\API\Classes;

class Users extends AbstractDbEntity
{
    const HASH_SALT = 'xNd7Ksm4ah2v';

    public $name;
    public $email;
    public $password;
    public $status;

    public function create()
    {
        $result = [
            'success' => true,
            'errors' => [],
            'status' => 201
        ];

        if ($this->isNotExisted()) {
            $password_hash = $this->hashPassword();
            $api_key = $this->createApiKey();
            $sql = "INSERT INTO `users`(`name`,`email`,`password_hash`,`api_key`,`status`) 
                    VALUES ('$this->name','$this->email','$password_hash','$api_key',1);";
            $query = $this->query($sql);

            if (!$query) {
                $result['success'] = false;
                $result['errors'][] = 'Failed to create user';
                $result['status'] = 200;
            }
        } else {
            $result['success'] = false;
            $result['errors'][] = 'User already exists.';
            $result['status'] = 200;
        }

        return $result;
    }

    public function read($id)
    {
        // TODO: Implement read() method.
    }

    public function update($id)
    {
        return false;
    }

    public function delete($id)
    {
        return false;
    }

    public function validateRegister($data)
    {
        $validator = [
            'success' => true,
            'errors' => [],
            'status' => 200
        ];

        return $validator;
    }

    public function validateLogin($data)
    {
        $validator = [
            'success' => true,
            'errors' => [],
            'status' => 200,
            'data' => []
        ];

        return $validator;
    }

    public function login()
    {
        $result = [
            'success' => true,
            'errors' => [],
            'status' => 200,
            'data' => []
        ];

        $password_hash = $this->hashPassword();
        $sql = "SELECT `id`,`name`,`email`,`api_key` 
                FROM `users` 
                WHERE `email` = '$this->email' 
                  AND `password_hash` = '$password_hash'
                  AND `status` = 1;";
        $query = $this->query($sql);

        if (empty($query[0])) {
            $result['success'] = false;
            $result['errors'][] = 'Incorrect credentials';
        } else {
            $result['data'] = $query[0];
        }

        return $result;
    }

    public function getByApiKey($key)
    {
        $result = [
            'success' => true,
            'errors' => [],
            'status' => 200,
            'data' => []
        ];

        $sql = "SELECT `id`,`name`,`email` 
                FROM `users` 
                WHERE `api_key` = '$key' 
                  AND `status` = 1;";
        $query = $this->query($sql);

        if (empty($query[0])) {
            $result['success'] = false;
            $result['errors'][] = 'Incorrect API key';
            $result['status'] = 401;
        } else {
            $result['data'] = $query[0];
        }

        return $result;
    }

    protected function isNotExisted()
    {
        $sql = "SELECT `id` FROM `users` WHERE `email` = '$this->email'";
        $query = $this->query($sql);

        return empty($query[0]);
    }

    protected function hashPassword()
    {
        return md5(self::HASH_SALT . $this->password);
    }

    protected function createApiKey()
    {
        return md5(uniqid(mt_rand(), true));
    }
}