<?php

namespace lessons\oop\solid\isp;

/**
 * Class Captain
 * @package lessons\oop\solid\isp
 */
class Captain
{
    /**
     * @param CrewMember $crewMember
     */
    public function manage(CrewMember $crewMember)
    {
        $crewMember->work();
        $crewMember->sleep();
    }
}

/**
 * Class Crew
 * @package lessons\oop\solid\isp
 */
class CrewMember
{
    public function work()
    {
        echo "I'm working";
    }

    public function sleep()
    {
        echo "I'm sleeping";
    }
}

// TODO: add CrewMemberInterface
// TODO: replace CrewMember with HumanCrewMember
// TODO: add RobotCrewMember
// TODO: show violation of ISP
// TODO: replace CrewMemberInterface with WorkInterface and SleepInterface
// TODO: show violation of SRP
// TODO: add ManageInterface