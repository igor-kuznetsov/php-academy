<?php

$response = [
    'data' => [],
    'error' => ''
];

try {
    $mysqli = new mysqli('localhost', 'root', '', 'mvc');

    if ($mysqli->connect_errno) {
        throw new Exception($mysqli->connect_error);
    }

    $result = $mysqli->query("SELECT * FROM `pages`;");

    if ($mysqli->errno) {
        throw new Exception($mysqli->error);
    }

    while ($row = $result->fetch_assoc()) {
        $response['data'][] = $row;
    }
} catch (Exception $e) {
    $response['error'] = $e->getMessage();
}

echo json_encode($response);
exit;