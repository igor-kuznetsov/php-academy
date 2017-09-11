<?php

namespace Advanced\Smarty;

require_once 'vendor/autoload.php';

use Smarty;
use Advanced\Smarty\Lib\MyClass;

$smarty = new Smarty();

$tpl = $smarty->createTemplate('templates/first.tpl');
$tpl->assign('name', 'Vasya');
$tpl->assign('myArray', [
    'first value of array',
    'test_assoc' => 'Assoc works just fine!',
    'multi' => [
        'test' => 3
    ]
]);
$tpl->assign('boolean_var', true);
$tpl->assign('obj', new MyClass());

$smarty->display($tpl);