<?php

/**
 * Class Config
 */
class Config
{
    protected static $settings = [];

    /**
     * @param $key
     * @return null
     */
    public static function get($key)
    {
        return isset(self::$settings[$key]) ? self::$settings[$key] : null;
    }

    /**
     * @param $key
     * @param $value
     */
    public static function set($key, $value)
    {
        self::$settings[$key] = $value;
    }
}