<?php

namespace Advanced\Twig;

require_once 'vendor/autoload.php';

use Advanced\Twig\Lib\MyClass;
use Twig_Loader_Filesystem;
use Twig_Environment;

$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader, array(
    'cache' => 'templates_c',
    'debug' => true
));

echo $twig->render('index.twig', [
    'name' => 'Vasya',
    'myArray' => [
        'first value of array',
        'test_assoc' => 'Assoc works just fine!',
        'multi' => [
            'test' => 3
        ]
    ],
    'boolean_var' => true,
    'obj' => new MyClass(),
    'section_variable' => 'section variable value'
]);

//echo $twig->render('home.twig');

//echo $twig->render('page.twig');