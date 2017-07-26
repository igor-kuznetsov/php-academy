<?php

namespace lessons\oop\solid\ocp;

/**
 * Interface PaymentMethodInterface
 * @package lessons\oop\solid\ocp
 */
interface PaymentMethodInterface
{
    public function acceptPayment($order);
}
