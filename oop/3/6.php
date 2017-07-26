<?php

namespace PhpAcademy\Oop\Lesson3\Ex6;

use PDO;
use PDOException;

$dsn = 'mysql:host=localhost;dbname=classicmodels';
$user = 'root';
$password = '';

try {
    $db = new PDO($dsn, $user, $password); // open DB connection

    $st = $db->query("SELECT * FROM `products` LIMIT 2;"); // query DB and get statement

    $products = $st->fetchAll(PDO::FETCH_ASSOC); // fetch all results as assoc array

    print("<pre>");
    print_r($products);
    print("</pre>");

    // use foreach to process all results one by one
    print("<hr>");
    foreach ($db->query("SELECT * FROM `customers` LIMIT 2;") as $row) {
        print("<pre>");
        print_r($row);
        print("</pre>");
    }

    // or use fetch to process each row
    print("<hr>");
    $st = $db->query("SELECT * FROM `orders` LIMIT 2;");
    while ($row = $st->fetch()) {
        print("<pre>");
        print_r($row);
        print("</pre>");
    }

    // close connection manually (but it's not necessary)
    $st = null;
    $db = null;
} catch (PDOException $e) {
    die("Error: " . $e->getMessage() . "<br/>");
} catch (\Exception $e) {
    print $e->getMessage();
    die;
}