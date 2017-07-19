<?php

/**
 * Class TestStaticParent
 */
class TestStaticParent
{
    public $name;
    public $value;

    function __construct()
    {
        $this->name =  __CLASS__;
        $this->value = 200;
    }
}

/**
 * Class TestStaticChild
 */
class TestStaticChild extends TestStaticParent
{
    function __construct()
    {
        parent::__construct();
        $this->name = __CLASS__;
    }
}

$obj1 = new TestStaticParent();
echo "$obj1->name : $obj1->value";
echo '<hr>';

$obj2 = new TestStaticChild();
echo "$obj2->name : $obj2->value";