<?php

namespace Advanced\Patterns\Observer;

use SplObserver;
use SplSubject;

/**
 * Class UserObserver
 * @package Advanced\Patterns\Observer
 */
class UserObserver implements SplObserver
{
    /**
     * It is called by the Subject, usually by SplSubject::notify()
     *
     * @param SplSubject $user
     */
    public function update(SplSubject $user)
    {
        printf('User with ID#%s changed his email address to %s', $user->getId(), $user->getEmail());
    }
}
