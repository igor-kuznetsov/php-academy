<?php

namespace lessons\oop\solid\srp;

spl_autoload_register(function($class) {
    $parts = explode("\\", $class);
    $class_path = end($parts) . '.php';

    if (is_file($class_path)) {
        require $class_path;
    }
});

$reporter = new PaymentsReporterFixed(new PaymentsRepository());

echo $reporter->between('2003-10-10', '2004-11-11', new HtmlOutput());