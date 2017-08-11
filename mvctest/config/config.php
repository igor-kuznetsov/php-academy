<?php

Config::set('site_name', 'My Site Name');

// Routes. Route name => Action prefix
Config::set('routes', [
    'default' => '',
    'admin' => 'admin_'
]);

Config::set('default_route', 'default');
Config::set('default_controller', 'pages');
Config::set('default_action', 'index');
Config::set('default_language', 'en');

Config::set('languages', ['en', 'fr']);

Config::set('db.host', 'localhost');
Config::set('db.user', 'root');
Config::set('db.pass', 'MD56kq');
Config::set('db.name', 'mvc');

Config::set('salt', 'ec00a705187bb3fb11');