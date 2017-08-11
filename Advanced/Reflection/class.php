<?php

/**
 * Class Manager
 */
class Manager
{
    const ROLE_ADMIN = 'admin';
    const ROLE_BOSS = 'boss';

    public $name;
    protected $role;
    private $workHours = 8;
    private $log;

    /**
     * @param string $role
     * @throws Exception
     */
    public function __construct($role = self::ROLE_ADMIN)
    {
        if (in_array($role, [self::ROLE_ADMIN, self::ROLE_BOSS])) {
            $this->role = $role;
        } else {
            throw new Exception('Unknown role');
        }
    }

    public function work()
    {
        switch ($this->role) {
            case self::ROLE_BOSS:
                $this->doNothing();
                break;
            case self::ROLE_ADMIN:
            default:
                $this->doWork();
                break;
        }

        $this->report();
    }

    protected function doWork()
    {
        $amountOfWork = $this->workHours;

        while ($amountOfWork) {
            $amountOfWork--;
        }

        $this->log = 'I have worked for '.$this->workHours.' hours';
    }

    protected function doNothing()
    {
        $this->log = 'I have not done anything today';
    }

    private function report()
    {
        echo 'I am a manager.<br>';
        echo 'My role is '.$this->role.'<br>';
        echo $this->log.'<br>';
        echo 'My work is done';
    }
}

try {
    $object = new Manager();

    $reflectionClass = new ReflectionClass($object);

    $reflectionProperty = $reflectionClass->getProperty('workHours');
    $reflectionProperty->setAccessible(true);
    $reflectionProperty->setValue($object, 12);

    foreach ($reflectionClass->getMethods(ReflectionMethod::IS_PUBLIC) as $reflectionMethod) {
        if (! $reflectionMethod->isConstructor()) {
            $reflectionMethod->invoke($object);
        }
    }
} catch (Exception $e) {
    echo $e->getMessage();
}