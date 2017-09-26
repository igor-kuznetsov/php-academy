<?php

namespace Advanced\Payment;

require_once 'vendor/autoload.php';
require_once 'config.php';

use Stripe\Stripe;
use Stripe\Charge;
use Stripe\Customer;

// Set your secret key
// See your keys here: https://dashboard.stripe.com/account/apikeys
Stripe::setApiKey(STRIPE_API_SK);

// Token is created using Stripe.js or Checkout!
// Get the payment token ID submitted by the form:
$token = $_POST['stripeToken'];

if (empty($token)) {
    echo 'Payment error: Token is empty!';
} else {
    $customer = Customer::create([
        'email' => $_POST['stripeEmail'],
        'source' => $token
    ]);

    echo 'Customer ID: ' . $customer->id . "<br>";

    $charge = Charge::create([
        "customer" => $customer->id,
        "amount" => 1000,
        "currency" => "usd",
        "description" => "My Example Charge"
    ]);

    echo 'Charge ID: ' . $charge->id . "<br>";
    echo 'Charge Status: ' . $charge->status . "<br>";

    echo '<hr>';
    echo 'Successfully charged $10.00';
}
