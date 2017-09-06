<?php

$subject = "Lor8m tst test test2 3www 4www ipsum dol\nr \tsit amet, x^v [abc] teeeest alpha beta teest teeest 69 /*adip /* ggg */iscing*/ elit.";
$matches = [];

$pattern = '/ipsum/';
$pattern = '/iPsUm/i';
$pattern = '/^Lorem/';// ^http
$pattern = '/x\^v/';
$pattern = '/\w/';
$pattern = '/\W/';
$pattern = '/\d/';
$pattern = '/\D/';
$pattern = '/\s/';
$pattern = '/\S/';
$pattern = '/elit\.$/';
$pattern = '/dol.r/s';
$pattern = '/ips[aiou]m/';
$pattern = '/\[abc\]/';
$pattern = '/[abc]/';
$pattern = '/am[^tsgh]t/';
$pattern = '/[a-e]ol/';
$pattern = '/[4-7]9/';
$pattern = '/Lor[\D8]m/';
$pattern = '/amet|elit/';
$pattern = '/ips(a|u|o)(m|n)/';
$pattern = '/teeeest (alpha|gamma) (beta|teta)/';
$pattern = '/t[e]+st/';//{1,}
$pattern = '/t[e]+[w]*st/';//{0,}
$pattern = '/te{4}st/';
$pattern = '/te{2,4}st/';
$pattern = '/t[est]{1,9}/';
$pattern = '/te?st/';//{0,1}
$pattern = '/testw{0}/';
$pattern = '~/\*.*\*/~U';
$pattern = '/test(?=[2-5])/';
$pattern = '/test(?=\d)/';
$pattern = '/test(?=alpha|beta|gamma)/';
$pattern = '/test(?!2)/';
$pattern = '/(?<=3)www/';
$pattern = '/(?<!3)www(?#my comment goes here)/';
$pattern = '/[w]+#dfdfdf/x';

$result = preg_match_all($pattern, $subject, $matches);

var_dump($result);
echo '<hr>';
echo '<pre>';
print_r($matches);