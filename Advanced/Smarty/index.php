<?php

namespace Advanced\Smarty;

require_once 'vendor/autoload.php';

use Smarty;
use Advanced\Smarty\Lib\MyClass;

$smarty = new Smarty();

$tpl = $smarty->createTemplate('templates/index.tpl');
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
$tpl->assign('part_var', 'part variable value');

$smarty->display($tpl);

//$smarty->display('home.tpl');

//$smarty->display('page.tpl');