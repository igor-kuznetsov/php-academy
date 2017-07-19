<?php

/**
 * Class User
 */
class User
{
    public $email;
    public $password;

    public function login()
    {
        echo 'login';
    }
}

/**
 * Class Admin
 */
class Admin extends User
{
    public function manageUsers()
    {
        echo 'manage users';
    }
}

/**
 * Class Writer
 */
class Writer extends User
{
    public function manageArticles()
    {
        echo 'manage articles';
    }
}

$obj = new Admin();
$obj->email = 'test@mail.com';
$obj->password = 'pswd123';

print "<pre>";
print_r($obj);
print "</pre>";

echo "<hr>";
$obj->manageUsers();

echo "<hr>";
$obj->login();

echo "<hr>";
$obj->manageArticles();