<?php

namespace Advanced\Patterns\Strategy;

/**
 * Interface ComparatorInterface
 * @package Advanced\Patterns\Strategy
 */
interface ComparatorInterface
{
    public function compare($a, $b): int;
}