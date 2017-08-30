<?php

error_reporting(E_ALL);

// unlimited script time
set_time_limit(0);

// output instantly
ob_end_flush();
ob_implicit_flush();

$address = '127.0.0.1';
$port = 10000;

if (($sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)) === false) {
    echo "socket_create() failed: " . socket_strerror(socket_last_error()) . PHP_EOL;
}

if (socket_bind($sock, $address, $port) === false) {
    echo "socket_bind() failed: " . socket_strerror(socket_last_error($sock)) . PHP_EOL;
}

if (socket_listen($sock, 5) === false) {
    echo "socket_listen() failed: " . socket_strerror(socket_last_error($sock)) . PHP_EOL;
}

do {
    if (($msg_sock = socket_accept($sock)) === false) {
        echo "socket_accept() failed: " . socket_strerror(socket_last_error($sock)) . PHP_EOL;
        break;
    }
    /* Send instructions. */
    $msg = PHP_EOL."Welcome to the PHP Test Server.".
        PHP_EOL."To quit, type 'quit'.".
        PHP_EOL."To shut down the server, type 'shutdown'.".PHP_EOL;
    socket_write($msg_sock, $msg, strlen($msg));

    do {
        if (false === ($buf = socket_read($msg_sock, 2048, PHP_NORMAL_READ))) {
            echo "socket_read() failed: " . socket_strerror(socket_last_error($msg_sock)) . PHP_EOL;
            break 2;
        }

        if (!$buf = trim($buf)) {
            continue;
        }

        if ($buf == 'quit') {
            break;
        }

        if ($buf == 'shutdown') {
            socket_close($msg_sock);
            break 2;
        }

        $talk_back = "PHP: You said '$buf'.".PHP_EOL;
        socket_write($msg_sock, $talk_back, strlen($talk_back));
        echo "$buf".PHP_EOL;
    } while (true); // endless loop
    socket_close($msg_sock);
} while (true); // endless loop

socket_close($sock);