<?php

$pattern = '/(foo)(bar)(test)*/';
$subject = 'foobartest foobar';
$matches = [];

$result = preg_match($pattern, $subject, $matches);

var_dump($result);
echo '<hr>';
echo '<pre>';
print_r($matches);