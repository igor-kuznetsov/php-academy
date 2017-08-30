<?php

$ch = curl_init('http://php.net');
$fp = fopen('phpnet_homepage.html', 'w');

curl_setopt($ch, CURLOPT_FILE, $fp);
curl_setopt($ch, CURLOPT_HEADER, false);

curl_exec($ch);

if (curl_errno($ch)) {
    exit('cURL error: ' . curl_error($ch));
}

curl_close($ch);
fclose($fp);