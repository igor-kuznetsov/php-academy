<?php

Config::set('site_name', 'My MVC Framework');
// Route name => Action prefix
Config::set('routes', [
    'default' => '',
    'admin' => 'admin_'
]);

Config::set('default_route', 'default');
Config::set('default_controller', 'pages');
Config::set('default_action', 'index');

Config::set('languages', ['en', 'fr', 'es']);
Config::set('default_language', 'en');

Config::set('db_host', 'localhost');
Config::set('db_name', 'mvc');
Config::set('db_user', 'root');
Config::set('db_pass', '');

Config::set('salt', 'ts559retvcda0A');