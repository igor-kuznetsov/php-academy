<?php

/**
 * Class Cart
 */
class Cart
{
    const SESSION_KEY = 'cart';

    /**
     * @param int $id
     */
    public static function add($id)
    {
        $products = self::get();

        if (! in_array($id, $products)) {
            $products[] = $id;
        }

        $_SESSION[self::SESSION_KEY] = $products;
    }

    /**
     * @param int $id
     */
    public static function remove($id)
    {
        $products = self::get();

        $key = array_search($id, $products);
        if ($key !== false) {
            unset($products[$key]);
        }

        $_SESSION[self::SESSION_KEY] = $products;
    }

    /**
     * @return void
     */
    public static function clear()
    {
        if (isset($_SESSION[self::SESSION_KEY])) {
            unset($_SESSION[self::SESSION_KEY]);
        }
    }

    /**
     * @return int
     */
    public static function getCount()
    {
        return count(self::get());
    }

    /**
     * @return array
     */
    public static function getProducts()
    {
        $products = [];
        $productIds = self::get();

        if (!empty($productIds)) {
            $products = Product::getByIds($productIds);
        }

        return $products;
    }

    /**
     * @return array
     */
    protected static function get()
    {
        return empty($_SESSION[self::SESSION_KEY]) ? [] : $_SESSION[self::SESSION_KEY];
    }
}
