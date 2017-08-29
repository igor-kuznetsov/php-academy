<?php

namespace Advanced\SOAP;

use SoapClient;

require_once '../autoload.php';

/**
 * Class MySoapClient
 * @package Advanced\SOAP
 */
class MySoapClient
{
    private $client;

    public function __construct()
    {
        $params = [
            'location' => 'http://soap-server.loc/service.php',
            'uri' => 'urn://soap-server.loc/service.php',
            'trace' => true
        ];
        $this->client = new SoapClient(null, $params);
    }

    public function getProduct($code)
    {
        //return $this->client->__soapCall('getProductName', [$code]);
        return $this->client->getProductName($code);
    }
}