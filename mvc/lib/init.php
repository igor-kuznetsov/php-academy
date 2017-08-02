<?php

spl_autoload_register(function ($class_name) {
    $lib_path = ROOT.DS.'lib'.DS.strtolower($class_name).'.class.php';
    $controllers_path = '';
    $models_path = '';

    if (file_exists($lib_path)) {
        require_once $lib_path;
    } elseif (file_exists($controllers_path)) {
        require_once $controllers_path;
    } elseif (file_exists($models_path)) {
        require_once $models_path;
    } else {
        throw new Exception('Failed to load class: '.$class_name);
    }
});

require_once ROOT.DS.'config'.DS.'config.php';