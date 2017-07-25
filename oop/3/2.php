<?php

namespace PhpAcademy\Oop\Lesson3\Ex2;

use Exception;

function inverse($x) {
    if (!$x) {
        throw new Exception('Division by zero.');
    }

    return 1/$x;
}

try {
    echo inverse(5) . "<br>";
    echo inverse(0) . "<br>";
} catch (Exception $e) {
    echo 'Error: ',  $e->getMessage(), "<br>";
}

/**
 * Class MyException
 * @package PhpAcademy\Oop\Lesson2\Ex20
 */
class MyException extends Exception
{
    public function __construct($message, $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function __toString()
    {
        return __CLASS__ . ": {$this->message}" . "<br>";
    }

    public function customFunction()
    {
        echo "<p>we can add new methods to our exception class</p>";
    }
}

/**
 * Class TestMyException
 * @package PhpAcademy\Oop\Lesson2\Ex20
 */
class TestMyException
{
    public $var;

    const THROW_NONE = 0;
    const THROW_MY = 1;
    const THROW_DEFAULT = 2;

    function __construct($value = self::THROW_NONE)
    {
        switch ($value) {
            case self::THROW_MY:
                throw new MyException('My Exception was caught');
                break;

            case self::THROW_DEFAULT:
                throw new Exception('Default Exception was caught');
                break;

            default:
                $this->var = $value;
                break;
        }
    }
}

//try {
//    $obj = new TestMyException(TestMyException::THROW_MY);
//    var_dump($obj);
//} catch (MyException $e) {
//    echo $e;
//    $e->customFunction();
//} catch (Exception $e) {
//    echo $e->getMessage();
//}