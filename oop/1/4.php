<?php

/**
 * Class SiteUser
 */
class SiteUser
{
    public $email;
    protected $password;

    public function login()
    {
        echo 'login';
    }
}

/**
 * Class Admin
 */
class Admin extends SiteUser
{
    public function manageUsers()
    {
        echo 'manage users';
    }

    public function setPassword($value)
    {
        $this->password = $value;
    }

    public function login()
    {
        echo 'admin login';
    }
}

/**
 * Class Writer
 */
class Writer extends SiteUser
{
    public function manageArticles()
    {
        echo 'manage articles';
    }
}

$obj = new Admin();
$obj->email = 'test@mail.com';
$obj->setPassword('pswd123');

print "<pre>";
print_r($obj);
print "</pre>";

echo "<hr>";
$obj->manageUsers();

echo "<hr>";
$obj->login();

echo "<hr>";
$obj->manageArticles();

echo '---------------------';