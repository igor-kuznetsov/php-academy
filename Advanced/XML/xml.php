<?php

namespace Advanced\XML;

$xml = simplexml_load_file('data.xml');

// change values
$xml->movie->title = 'New title for my XML';

// add new attributes
$xml->movie[0]->addAttribute('test', 'some value');

// add new elements
$xml->movie[0]->addChild('status', 'New');

$character = $xml->movie[0]->characters->addChild('character');
$character->addChild('name', 'Test Name');
$character->addChild('actor', 'Test Actor');

// removing elements
unset($xml->movie[0]->plot);

header('Content-type: text-xml');
echo $xml->asXML();