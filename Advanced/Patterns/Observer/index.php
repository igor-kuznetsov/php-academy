<?php

namespace Advanced\Patterns\Observer;

require_once '../../autoload.php';

$observer = new UserObserver();
$user = new User(10);
$user->attach($observer);
$user->changeEmail('foo@bar.com');