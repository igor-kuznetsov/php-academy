<?php

namespace Advanced\Patterns\Strategy;

/**
 * Class IdComparator
 * @package Advanced\Patterns\Strategy
 */
class IdComparator implements ComparatorInterface
{
    public function compare($a, $b): int
    {
        return $a['id'] <=> $b['id'];
    }
}