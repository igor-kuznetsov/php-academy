<?php

namespace lessons\oop\solid\isp;

interface WorkInterface
{
    public function work();
}

interface SleepInterface
{
    public function sleep();
}

interface ManageInterface
{
    public function manage();
}

/**
 * Class Captain
 * @package lessons\oop\solid\isp
 */
class Captain
{
    /**
     * @param ManageInterface $manage
     */
    public function manage(ManageInterface $manage)
    {
        $manage->manage();
    }
}

/**
 * Class Crew
 * @package lessons\oop\solid\isp
 */
class CrewMember implements WorkInterface, SleepInterface, ManageInterface
{
    public function work()
    {
        echo "I'm working";
    }

    public function sleep()
    {
        echo "I'm sleeping";
    }

    public function manage()
    {
        $this->work();
        $this->sleep();
    }
}

/**
 * Class Robot
 * @package lessons\oop\solid\isp
 */
class Robot implements WorkInterface, ManageInterface
{
    public function work()
    {
        echo "I'm working";
    }

    public function manage()
    {
        $this->work();
    }
}