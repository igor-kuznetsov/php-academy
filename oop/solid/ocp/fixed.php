<?php

namespace lessons\oop\solid\ocp;

$checkout = new CheckoutFixed();
$checkout->start(new Order(), new CashPaymentMethod());