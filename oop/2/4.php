<?php

/**
 * Class Figure
 */
abstract class Figure
{
    abstract public function calculateArea();
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

//TODO: add class Circle