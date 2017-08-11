<?php

namespace Advanced;

define('ROOT', (dirname(dirname(__FILE__))));
define('DS', DIRECTORY_SEPARATOR);

spl_autoload_register(function($class_name) {
    $class_path = ROOT . DS . str_replace('\\', DS, $class_name).'.php';

    if (file_exists($class_path)) {
        require_once $class_path;
    }
});