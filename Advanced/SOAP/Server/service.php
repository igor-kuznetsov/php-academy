<?php

namespace Advanced\SOAP\Server;

use SoapServer;

require_once '../../autoload.php';

$params = [
    'uri' => 'lessons/Advanced/SOAP/Server/MySoapServer.php'
];
$server = new SoapServer(null, $params);
$server->setClass('Advanced\SOAP\Server\MySoapServer');
$server->handle();