<?php

$array = [5, 2, 60, 45, 7, 10, 3, 4, 8, 12, 1];
$object = new ArrayObject($array);
/** @var ArrayIterator $iterator */
$iterator = $object->getIterator();
//var_dump($iterator);die;

echo 'count: ' . $iterator->count() . '<br>';

$iterator->append(100);
$iterator->asort();

while ($iterator->valid()) {
    echo $iterator->current();
    echo '<br>';
    $iterator->next();
}

echo '<hr>';
echo $iterator->serialize();