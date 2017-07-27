<?php


/**
 * Class User
 */
class User extends Entity
{
    /**
     * @return string
     */
    protected static function getTable()
    {
        return 'users';
    }

    /**
     * @return array
     */
    protected static function getColumns()
    {
        return [
            'id',
            'login',
            'password'
        ];
    }

    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        if (is_array($data) && !empty($data)) {
            $this->id = $data['id'] ?? null;
            $this->login = $data['login'] ?? null;
        }
    }
}
