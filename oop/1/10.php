<?php

define('TEST_CONST', 10000);

/**
 * Class ClassConstants
 */
class ClassConstants
{
    const ALPHA = 'a';
    const BETA = 'b';
    const NUMBER = 10;

    public static function outputAlpha()
    {
        echo ClassConstants::ALPHA;
    }

    public function outputBeta()
    {
        echo ClassConstants::BETA;
    }

    public static function getTestConst()
    {
        echo TEST_CONST;
    }
}

echo ClassConstants::ALPHA;
echo '<hr>';

$obj = new ClassConstants();
echo $obj::ALPHA;
echo '<hr>';

ClassConstants::outputAlpha();
echo '<hr>';

$obj->outputBeta();
echo '<hr>';

ClassConstants::getTestConst();

//$obj::ALPHA = 10;
//ClassConstants::ALPHA = 20;