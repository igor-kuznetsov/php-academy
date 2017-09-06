<?php

$pattern = '~\d+~';
$replacement = '6';
$subject = 'Give me 12 eggs then 12 more.';

$result = preg_replace($pattern, $replacement, $subject);

var_dump($result);