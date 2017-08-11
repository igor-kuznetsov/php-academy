<?php

namespace Advanced\Patterns\Strategy;

/**
 * Class DateComparator
 * @package Advanced\Patterns\Strategy
 */
class DateComparator implements ComparatorInterface
{
    public function compare($a, $b): int
    {
        $aDate = new \DateTime($a['date']);
        $bDate = new \DateTime($b['date']);

        return $aDate <=> $bDate;
    }
}