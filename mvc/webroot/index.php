<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));

require_once ROOT.DS.'lib'.DS.'init.php';

$router = new Router($_SERVER['REQUEST_URI']);

echo '<pre>';
echo 'URI: ' . $router->getUri().'<br>';
echo 'Route: ' . $router->getRoute().'<br>';
echo 'Controller: ' . $router->getController().'<br>';
echo 'Action:' . $router->getActionPrefix().$router->getAction().'<br>';
echo 'Params:';
print_r($router->getParams());