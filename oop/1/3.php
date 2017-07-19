<?php

/**
 * Class Account
 */
class Account
{
    public $first_name = 'First_name';
    public $last_name = 'Last_name';
    public $login = 'default_login';
    private $password = '';

    /**
     * @return string
     */
    public function getPassword():string
    {
        return $this->password;
    }

    /**
     * @param string $newPassword
     */
    public function setPassword(string $newPassword)
    {
        $this->password = $newPassword;
    }
}

$account = new Account();

$account->login = 'test_login';
//$user->password = 'testpassword';

$account->setPassword('newpassword');

var_dump($account->getPassword());

echo "<hr>";

foreach ($account as $key => $value) {
    echo "$key => $value" . "<br>";
}