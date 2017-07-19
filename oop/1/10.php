<?php

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
}

echo ClassConstants::ALPHA;
echo '<hr>';

$obj = new ClassConstants();
echo $obj::ALPHA;
echo '<hr>';

ClassConstants::outputAlpha();
echo '<hr>';

$obj = new ClassConstants();
$obj->outputBeta();
echo '<hr>';

//$obj::ALPHA = 10;
//ClassConstants::ALPHA = 20;