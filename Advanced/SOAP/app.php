<?php

namespace Advanced\SOAP;

require_once '../autoload.php';

$code = $_GET['code'] ?? null;

if (empty($code)) {
    die('Product code is required');
}

$client = new MySoapClient();
$name = $client->getProduct($code);
echo $name;