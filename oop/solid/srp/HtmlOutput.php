<?php

namespace lessons\oop\solid\srp;

/**
 * Class HtmlOutput
 * @package lessons\oop\solid\s
 */
class HtmlOutput implements PaymentsOutputInterface
{
    public function output($value)
    {
        return "<h2>Payments: $value</h2>";
    }
}
