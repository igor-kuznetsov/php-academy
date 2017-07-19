<?php

/**
 * Class TestLateStaticParent
 */
class TestLateStaticParent
{
    public static function who()
    {
        echo __CLASS__;
    }

    public static function test()
    {
        self::who();
        //static::who();
    }
}

/**
 * Class TestLateStaticChild
 */
class TestLateStaticChild extends TestLateStaticParent
{
    public static function who()
    {
        echo __CLASS__;
    }
}

TestLateStaticParent::who();
echo '<hr>';

TestLateStaticChild::who();
echo '<hr>';

TestLateStaticChild::test();
echo '<hr>';