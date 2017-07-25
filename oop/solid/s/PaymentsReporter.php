<?php

namespace lessons\oop\solid\s;

use Exception;
use PDO;

/**
 * Class PaymentsReporter
 * @package lessons\oop\solid\s
 */
class PaymentsReporter
{
    /**
     * @param string $start
     * @param string $end
     * @return string
     * @throws Exception
     */
    public function between(string $start, string $end)
    {
        if (!Auth::check()) {
            throw new Exception('Authentication is required');
        }

        $startDate = $this->formatDate($start);
        $endDate = $this->formatDate($end);

        $sales = $this->queryDbForPaymentsBetween($startDate, $endDate);

        return $this->format($sales);
    }

    /**
     * @param string $startDate
     * @param string $endDate
     * @return float
     */
    protected function queryDbForPaymentsBetween($startDate, $endDate)
    {
        return 100.67;
    }

    /**
     * @param mixed $value
     * @return string
     */
    protected function format($value)
    {
        return "<h2>Payments: $value</h2>";
    }

    /**
     * @param string $value
     * @return string
     */
    protected function formatDate(string $value)
    {
        return date('Y-m-d', strtotime($value));
    }
}