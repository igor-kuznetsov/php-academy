<?php

/**
 * Class Figure
 */
abstract class Figure
{
    abstract public function calculateArea();

    public function test()
    {
        //jgjfjfdjg
    }
}

/**
 * Class Rectangle
 */
class Rectangle extends Figure
{
    public $width;
    public $height;

    /**
     * @param int $width
     * @param int $height
     */
    function __construct(int $width, int $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    /**
     * @return int
     */
    public function calculateArea():int
    {
        return $this->width * $this->height;
    }
}

/**
 * Class Circle
 */
class Circle extends Figure
{
    public function calculateArea()
    {
        // TODO: Implement calculateArea() method.
    }
}