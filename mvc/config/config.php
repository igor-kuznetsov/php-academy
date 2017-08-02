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