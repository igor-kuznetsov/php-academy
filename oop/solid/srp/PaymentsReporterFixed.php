<?php

namespace lessons\oop\solid\srp;

/**
 * Class PaymentsReporterFixed
 * @package lessons\oop\solid\s
 */
class PaymentsReporterFixed
{
    private $repo;

    /**
     * @param PaymentsRepository $repository
     */
    function __construct(PaymentsRepository $repository)
    {
        $this->repo = $repository;
    }

    /**
     * @param string $startDate
     * @param string $endDate
     * @param PaymentsOutputInterface $formatter
     */
    public function between($startDate, $endDate, PaymentsOutputInterface $formatter)
    {
        $payments = $this->repo->between($startDate, $endDate);

        return $formatter->output($payments);
    }
}
