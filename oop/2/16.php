<?php

namespace PhpAcademy\Oop\Lesson2\Ex16;

/**
 * Trait ChatA
 * @package PhpAcademy\Oop\Lesson2\Ex16
 */
trait ChatA
{
    public function smallTalk()
    {
        echo 'a';
    }

    public function bigTalk()
    {
        echo 'A';
    }
}

/**
 * Trait ChatB
 * @package PhpAcademy\Oop\Lesson2\Ex16
 */
trait ChatB
{
    public function smallTalk()
    {
        echo 'b';
    }

    public function bigTalk()
    {
        echo 'B';
    }
}

/**
 * Class User
 * @package PhpAcademy\Oop\Lesson2\Ex16
 */
class User
{
    use ChatA, ChatB {
        ChatB::smallTalk insteadof ChatA;
        ChatB::bigTalk as bigTalkB;
        ChatA::bigTalk insteadof ChatB;
    }
}
