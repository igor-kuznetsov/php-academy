<?php

/**
 * Class TestStaticSelf
 */
class TestStaticSelf
{
    const HASH = 'sdFt45ure4sTGhrSFDs6ccx';

    public static $name = 'Test Name';

    public static function getName()
    {
        return self::$name;
    }

    public function getHash()
    {
        return self::HASH;
    }
}

echo TestStaticSelf::getName();
echo '<hr>';

$obj = new TestStaticSelf();
echo $obj->getHash();