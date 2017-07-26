<?php

namespace lessons\oop\solid\ocp;

/**
 * Class CashPaymentMethod
 * @package lessons\oop\solid\ocp\fixed
 */
class CashPaymentMethod implements PaymentMethodInterface
{
    /**
     * @param $order
     */
    public function acceptPayment($order)
    {
        // accept cash payment
    }
}