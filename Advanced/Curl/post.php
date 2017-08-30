<?php

$data = [
    'name' => 'Vasya',
    'email' => 'vasya@email.com'
];

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'http://localhost/lessons/Advanced/Curl/form.php');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    exit('cURL error: ' . curl_error($ch));
}

curl_close($ch);
var_dump($response);