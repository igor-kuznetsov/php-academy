<?php

namespace Advanced\Patterns\Facade;

/**
 * Class Linux
 * @package Advanced\Patterns\Facade
 */
class Linux implements OsInterface
{
    public function halt()
    {
        // TODO: Implement halt() method.
    }

    public function getName()
    {
        return 'Linux';
    }
}
