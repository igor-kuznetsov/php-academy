<?php

namespace lessons\oop\solid\s;

spl_autoload_register(function($class) {
    $parts = explode("\\", $class);
    $class_path = end($parts) . '.php';

    if (is_file($class_path)) {
        require $class_path;
    }
});

$reporter = new PaymentsReporter();

echo $reporter->between('2003-10-10', '2004-11-11');