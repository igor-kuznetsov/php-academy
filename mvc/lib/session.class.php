<?php

class Session
{
    protected static $flash_messages;

    public static function setFlash($message)
    {
        self::$flash_messages = $message;
    }

    public static function hasFlash()
    {
        return !is_null(self::$flash_messages);
    }

    public static function flash()
    {
        echo self::$flash_messages;
        self::$flash_messages = null;
    }
}