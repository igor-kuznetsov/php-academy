<?php

namespace Advanced\Patterns\Strategy;

require_once '../../autoload.php';

$ids = [
    ['id' => 2],
    ['id' => 1],
    ['id' => 3]
];

$dates = [
    ['date' => '2014-03-03'],
    ['date' => '2015-03-02'],
    ['date' => '2013-03-01']
];

$idsCollection = new ObjectCollection($ids);
$idsCollection->setComparator(new IdComparator());
$sortedIds = $idsCollection->sort();

$datesCollection = new ObjectCollection($dates);
$datesCollection->setComparator(new DateComparator());
$sortedDates = $datesCollection->sort();


echo '<pre>';
print_r($sortedIds);
echo '<hr>';
print_r($sortedDates);