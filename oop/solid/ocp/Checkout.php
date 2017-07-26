<?php

namespace lessons\oop\solid\ocp;

/**
 * Class Checkout
 * @package lessons\oop\solid\ocp
 */
class Checkout
{
    /**
     * @param Order $order
     */
    public function start(Order $order)
    {
        $this->acceptCash($order);
    }

    /**
     * violates OCP
     *
     * @param $order
     */
    protected function acceptCash($order)
    {
        // accept the cash for this order
    }
}

// TODO: add PaymentMethodInterface
// TODO: add CashPaymentMethod
// TODO: add dependency injection for payment method to start() method