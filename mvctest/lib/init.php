<?php

spl_autoload_register(function($class_name) {
    $lib_path = ROOT.DS.'lib'.DS.strtolower($class_name).'.class.php';
    $controllers_path = ROOT.DS.'controllers'.DS.str_replace('controller', '', strtolower($class_name)).'.controller.php';
    $models_path = ROOT.DS.'models'.DS.strtolower($class_name).'.php';

    if (file_exists($lib_path)) {
        require_once $lib_path;
    } elseif (file_exists($controllers_path)) {
        require_once $controllers_path;
    } elseif (file_exists($models_path)) {
        require_once $models_path;
    } else {
        throw new Exception('Failed to load class "'.$class_name.'"');
    }
});

require_once(ROOT.DS.'config'.DS.'config.php');

function __($key, $default_value = '')
{
    return Lang::get($key, $default_value);
}