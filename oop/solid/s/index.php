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

echo $reporter->between('10/10/2003', '11/11/2004');