<?php

$pattern = '/(foo)(bar)(test)*/';
$subject = 'example foobartest foobar test2';
$matches = [];

$result = preg_match_all($pattern, $subject, $matches);

var_dump($result);
echo '<hr>';
echo '<pre>';
print_r($matches);