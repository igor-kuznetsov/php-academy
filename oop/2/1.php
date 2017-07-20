<?php

/**
 * Class TestOverloadingProperties
 */
class TestOverloadingProperties
{
    public $existing = 5;
    private $data = [];
    private $hidden = 22;

//    function __get($name)
//    {
//        if (array_key_exists($name, $this->data)) {
//            return $this->data[$name];
//        }
//
//        return null;
//    }
//
//    function __set($name, $value)
//    {
//        $this->data[$name] = $value;
//    }

//    function __isset($name)
//    {
//        return isset($this->data[$name]);
//    }
//
//    function __unset($name)
//    {
//        unset($this->data[$name]);
//    }

    public function getHidden()
    {
        return $this->hidden;
    }
}

$obj = new TestOverloadingProperties();

print "<pre>";
print_r($obj);
print "</pre>";
echo '<hr>';

$obj->a = 'A';
$obj->b = 2;
$obj->c = 10;
$obj->existing = 'overridden property';
$obj->hidden = 'hidden string';

echo $obj->getHidden();
echo '<hr>';

echo $obj->hidden;
echo '<hr>';

echo $obj->existing;
echo '<hr>';

print "<pre>";
print_r($obj);
print "</pre>";
echo '<hr>';

var_dump(isset($obj->b));
echo '<hr>';

unset($obj->c);

print "<pre>";
print_r($obj);
print "</pre>";