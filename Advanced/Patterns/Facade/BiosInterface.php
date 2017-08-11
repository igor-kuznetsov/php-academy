<?php

namespace Advanced\Patterns\Facade;

/**
 * Interface BiosInterface
 * @package Advanced\Patterns\Facade
 */
interface BiosInterface
{
    public function execute();
    public function waitForKeyPress();
    public function launch(OsInterface $os);
    public function powerDown();
}
