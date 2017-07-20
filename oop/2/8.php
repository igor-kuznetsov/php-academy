<?php

/**
 * Interface WorkInterface
 */
interface WorkInterface
{
    public function doSomeWork();
}

/**
 * Interface RestInterface
 */
interface RestInterface
{
    public function takeSomeRest();
}

/**
 * Interface ManageInterface
 */
interface ManageInterface extends WorkInterface, RestInterface
{
    public function manageSomeone();
}

/**
 * Class Employee
 */
class Employee implements ManageInterface
{
    public function doSomeWork()
    {
        echo "I'm working";
    }

    public function takeSomeRest()
    {
        echo "I'm resting";
    }

    public function manageSomeone()
    {
        echo "I'm managing";
    }
}