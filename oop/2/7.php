<?php

/**
 * Interface EmailInterface
 */
interface EmailInterface
{
    public function sendEmail();
}

/**
 * Interface PhoneInterface
 */
interface PhoneInterface
{
    public function callPhone();
}

/**
 * Class Operator
 */
class Operator implements EmailInterface, PhoneInterface
{
    //TODO: implement required methods
    //TODO: show wrong implementation (signature mismatch)
}