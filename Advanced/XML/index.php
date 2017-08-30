<?php

namespace Advanced\XML;

libxml_use_internal_errors(true);

$xml = simplexml_load_file('data.xml');

if (false === $xml) {
    echo 'XML errors:<br>';
    foreach(libxml_get_errors() as $error) {
        echo $error->message.'<br>';
    }
    die;
}

// SimpleXMLElement object structure
echo '<pre>';
print_r($xml);

// accessing elements with non permitted under PHP naming convention
echo '<hr>';
echo $xml->movie->{'great-lines'}->line;

// comparing with strings
echo '<hr>';
var_dump($xml->movie->title);
echo '<br>';
$title = (string) $xml->movie->title;
var_dump($title);
//echo $xml->movie->title;
//if ($xml->movie->title == 'test') {
//
//}

// accessing attributes
echo '<hr>';
//var_dump($xml->movie->rating);
foreach ($xml->movie->rating as $rating) {
    //print_r($rating);
    $type = (string) $rating['type'];
    echo $type.'='.$rating.'<br>';
}