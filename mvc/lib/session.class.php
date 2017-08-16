<?php

class Session
{
    const FLASH_KEY = 'flash';

    public static function setFlash($message)
    {
        $_SESSION[self::FLASH_KEY] = $message;
    }

    public static function hasFlash()
    {
        return !empty($_SESSION[self::FLASH_KEY]);
    }

    public static function flash()
    {
        echo $_SESSION[self::FLASH_KEY];
        $_SESSION[self::FLASH_KEY] = null;
    }

    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function get($key)
    {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

    public static function clear($key)
    {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }
}