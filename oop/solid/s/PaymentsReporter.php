<?php

namespace lessons\oop\solid\s;

use Exception;
use PDO;
use PDOException;

/**
 * Class PaymentsReporter
 * @package lessons\oop\solid\s
 */
class PaymentsReporter
{
    /**
     * @param string $startDate
     * @param string $endDate
     * @return string
     * @throws Exception
     */
    public function between($startDate, $endDate)
    {
        // violates SRP (it's application logic)
        if (!Auth::check()) {
            throw new Exception('Authentication is required');
        }

        $sales = $this->queryDbForPaymentsBetween($startDate, $endDate);

        return $this->format($sales);
    }

    /**
     * violates SRP (it's persistence layer)
     *
     * @param string $startDate
     * @param string $endDate
     * @return float
     */
    protected function queryDbForPaymentsBetween($startDate, $endDate)
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

    /**
     * violates SRP (it's presentation layer)
     *
     * @param mixed $value
     * @return string
     */
    protected function format($value)
    {
        return "<h2>Payments: $value</h2>";
    }
}