<?php

/**
 * Class Message
 */
class Message
{
    const SESSION_KEY = 'messages';

    const TYPE_GENERAL = 'general';
    const TYPE_ERROR = 'error';

    /**
     * @param string $text
     * @param string $type
     */
    public static function set($text, $type = self::TYPE_GENERAL)
    {
        $_SESSION[self::SESSION_KEY][$type][] = $text;
    }

    /**
     * @return array
     */
    public static function get():array
    {
        $messages = $_SESSION[self::SESSION_KEY];
        unset($_SESSION[self::SESSION_KEY]);

        return $messages;
    }

    /**
     * @return bool
     */
    public static function exists():bool
    {
        return ! empty($_SESSION[self::SESSION_KEY]);
    }
}
