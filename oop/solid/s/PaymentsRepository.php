<?php

namespace lessons\oop\solid\s;

use PDO;
use PDOException;

/**
 * Class PaymentsRepository
 * @package lessons\oop\solid\s\Repositories
 */
class PaymentsRepository
{
    /**
     * @param string $startDate
     * @param string $endDate
     * @return float
     */
    public function between($startDate, $endDate)
    {
        try {
            $dbh = new PDO('mysql:host=localhost;dbname=classicmodels', 'root', '');
            $query = "SELECT SUM(`amount`) FROM `payments` WHERE `paymentDate` BETWEEN :startDate AND :endDate;";
            $sth = $dbh->prepare($query);
            $sth->execute([
                'startDate' => $startDate,
                'endDate' => $endDate
            ]);
            $result = $sth->fetchColumn();
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }

        return $result;
    }
}
