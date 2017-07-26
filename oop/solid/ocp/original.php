<?php

namespace lessons\oop\solid\ocp;

$checkout = new Checkout();
$checkout->start(new Order());