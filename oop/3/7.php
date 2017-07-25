<?php

namespace PhpAcademy\Oop\Lesson3\Ex7;

use PDO;
use PDOException;

$dns = 'mysql:host=localhost;dbname=classicmodels';
$user = 'root';
$password = '';

try {
    $db = new PDO($dns, $user, $password);

    $query = "INSERT INTO `productlines` (`productLine`, `textDescription`) 
              VALUES (:line, :description);";
    $st = $db->prepare($query); // prepare query
    $st->bindParam(':line', $line);
    $st->bindParam(':description', $description);

    $line = 'test line 1';
    $description = 'description for test line 1';
    $st->execute();

    $line = 'test line 2';
    $description = 'description for test line 2';
    $st->execute();
} catch (PDOException $e) {
    print "Error: " . $e->getMessage() . "<br/>";
    die();
}