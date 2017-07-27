<?php

/**
 * Class StoreProduct
 */
class StoreProduct
{
    public $title;
}

$product = new StoreProduct();
$product->title = 'product 1';

$productCopy = $product;
$productCopy->title = 'product 2';

echo $product->title;

echo "<hr>";
$productClone = clone $product;
echo $productClone->title;

echo "<hr>";
$productClone->title = 'product 3';
echo $productClone->title;

echo "<hr>";
echo $product->title;