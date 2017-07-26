<?php

namespace lessons\oop\solid\isp;

/**
 * Interface PasswordRemindInterface
 * @package lessons\oop\solid\isp
 */
interface PasswordRemindInterface
{
    public function getReminderEmail();
}

/**
 * Class User
 * @package lessons\oop\solid\isp
 */
class User implements PasswordRemindInterface
{
    private $reminderEmail;

    /**
     * @return string
     */
    public function getReminderEmail()
    {
        return $this->reminderEmail;
    }
}

/**
 * Class Mailer
 * @package lessons\oop\solid\isp
 */
class Mailer
{
    /**
     * @param string $email
     */
    public function sendTo($email)
    {
        // send email
    }
}

/**
 * Class PasswordManager
 * @package lessons\oop\solid\isp
 */
class PasswordManager
{
    private $mailer;

    /**
     * @param Mailer $mailer
     */
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * @param PasswordRemindInterface $user
     */
    public function sendReminder(PasswordRemindInterface $user)
    {
        $this->mailer->sendTo($user->getReminderEmail());
    }
}

// TODO: explain why we use PasswordRemindInterface instead of User class