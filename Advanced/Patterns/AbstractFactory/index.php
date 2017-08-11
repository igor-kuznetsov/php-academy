<?php

namespace Advanced\Patterns\AbstractFactory;

require_once '../../autoload.php';

$factory = new HtmlFactory();
$html = $factory->createText('test text');

$factory = new JsonFactory();
$json = $factory->createText('test text');

echo $html->getText();
echo '<hr>';
echo $json->getText();