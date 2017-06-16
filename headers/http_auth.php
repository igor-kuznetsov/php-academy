<?php

//header('Expires: 10 Jul 2000 00:00:00 GMT');
//unset($_SERVER['PHP_AUTH_USER']);
if (!isset($_SERVER['PHP_AUTH_USER']) || $_SERVER['PHP_AUTH_USER'] != 'User') {
    header('WWW-Authenticate: Basic realm="Some text about my website"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Text if user clicks Cancel';
    exit;
} else {
    echo 'Hello' . $_SERVER['PHP_AUTH_USER'] . '. You entered password: '. $_SERVER['PHP_AUTH_PW'];
}