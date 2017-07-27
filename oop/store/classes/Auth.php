<?php

/**
 * Class Auth
 */
class Auth
{
    const HASH_SALT = 'xgBir7Na9';
    const SESSION_KEY = 'auth';

    /**
     * @return bool
     */
    public static function isLoggedIn():bool
    {
        return isset($_SESSION[self::SESSION_KEY]);
    }

    /**
     * Logs user out
     */
    public static function logout()
    {
        if (self::isLoggedIn()) {
            unset($_SESSION[self::SESSION_KEY]);
        }
    }

    /**
     * @return array
     */
    public static function login()
    {
        $errors = [];

        if (isset($_POST['login'])) {
            $post = $_POST['login'];

            if (empty($post['login'])) {
                $errors['login'] = 'Login is required';
            }

            if (empty($post['password'])) {
                $errors['password'] = 'Password is required';
            }

            if (empty($errors)) {
                $user = self::checkUser($post['login'], $post['password']);

                if (empty($user)) {
                    $errors['login'] = 'Wrong combination of login and password';
                } else {
                    $_SESSION[self::SESSION_KEY] = $user;
                    Message::set('You have been logged in.');

                    if (empty($_SESSION['login_redirect'])) {
                        header('Location: '.site_url('admin'));
                    } else {
                        header('Location: '.$_SESSION['login_redirect']);
                        unset($_SESSION['login_redirect']);
                    }

                    exit;
                }
            }
        }

        return $errors;
    }

    /**
     * @param string $login
     * @param string $password
     * @return mixed
     */
    protected static function checkUser($login, $password)
    {
        $user = null;
        $db = DbManager::getInstance();
        $query = "SELECT * FROM `users`
                  WHERE `login` = '$login' AND `password` = '".self::getHash($password)."';";

        foreach ($db->getPdo()->query($query) as $row) {
            $user = new User($row);
        }

        return $user;
    }

    /**
     * @param string $password
     * @param string $salt
     * @return string
     */
    protected static function getHash($password, $salt = self::HASH_SALT)
    {
        return md5($password . $salt);
    }
}
