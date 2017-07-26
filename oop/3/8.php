<?php

namespace PhpAcademy\Oop\Lesson3\Ex8;

use PDO;
use PDOException;

$dns = 'mysql:host=localhost;dbname=classicmodels';
$user = 'root';
$password = '';

try {
    $db = new PDO($dns, $user, $password);

    $query = "INSERT INTO `productlines` (`productLine`, `textDescription`) 
              VALUES (:line, :description);";
    $st = $db->prepare($query);

    $params = [
        ':line' => 'test line 3',
        ':description' => 'description for test line 3'
    ];
    $st->execute($params);

    $st->execute([
        'line' => 'test line 4',
        'description' => 'description for test line 4'
    ]);
} catch (PDOException $e) {
    print "Error: " . $e->getMessage() . "<br/>";
    die();
}