<?php

require 'config.php';

spl_autoload_register(function ($class) {
    $path = __DIR__ . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . $class . '.php';
    if (is_file($path)) {
        require $path;
    }
});

session_start();

/**
 * @param string $path
 * @return string
 */
function site_url(string $path = ''):string
{
    $url = BASE_URL;

    if ($path && is_string($path)) {
        $url .= '/' . ltrim($path, '/');
    }

    return $url;
}

/**
 * @param array $errors
 * @param string $field
 */
function render_error(array $errors, string $field)
{
    if (isset($errors[$field])) {
        printf('<span style="color:red;font-style:italic;">%s</span>', $errors[$field]);
    }
}

/**
 * @param mixed $value
 */
function debug($value)
{
    echo "<pre>";

    if (is_array($value)) {
        print_r($value);
    } else {
        var_dump($value);
    }

    echo "</pre>";
}