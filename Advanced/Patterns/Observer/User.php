<?php

namespace Advanced\Patterns\Observer;

use SplObjectStorage;
use SplObserver;
use SplSubject;

/**
 * Class User
 * @package Advanced\Patterns\Observer
 */
class User implements SplSubject
{
    private $id;
    private $email;

    /**
     * @var SplObjectStorage
     */
    private $observers;

    /**
     * @param $id
     */
    public function __construct($id)
    {
        $this->id = (int) $id;
        $this->observers = new SplObjectStorage();
    }

    /**
     * @param SplObserver $observer
     */
    public function attach(SplObserver $observer)
    {
        $this->observers->attach($observer);
    }

    /**
     * @param SplObserver $observer
     */
    public function detach(SplObserver $observer)
    {
        $this->observers->detach($observer);
    }

    /**
     * @param $email
     */
    public function changeEmail($email)
    {
        $this->email = $email;
        $this->notify();
    }

    /**
     *
     */
    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }
}
