<?php

/**
 * Interface EmailInterface
 */
interface EmailInterface
{
    public function sendEmail($x1);
}

/**
 * Interface PhoneInterface
 */
interface PhoneInterface
{
    public function callPhone();
}

/**
 * Class ParentOperator
 */
class ParentOperator
{
    //
}

/**
 * Class Operator
 */
class Operator extends ParentOperator implements EmailInterface, PhoneInterface
{
    public function sendEmail($x1)
    {
        // TODO: Implement sendEmail() method.
    }

    public function callPhone()
    {
        // TODO: Implement callPhone() method.
    }
}