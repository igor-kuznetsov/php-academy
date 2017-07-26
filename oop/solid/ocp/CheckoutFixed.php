<?php

namespace lessons\oop\solid\ocp;

/**
 * Class CheckoutFixed
 * @package lessons\oop\solid\ocp
 */
class CheckoutFixed
{
    /**
     * @param Order $order
     * @param PaymentMethodInterface $payment
     */
    public function start(Order $order, PaymentMethodInterface $payment)
    {
        $payment->acceptPayment($order);
    }
}