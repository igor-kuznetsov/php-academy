<?php

class App
{
    protected static $router;
    protected static $db;

    /**
     * @return mixed
     */
    public static function getRouter()
    {
        return self::$router;
    }

    public static function run($uri)
    {
        session_start();

        self::$router = new Router($uri);

        self::$db = new DB(
            Config::get('db_host'),
            Config::get('db_user'),
            Config::get('db_pass'),
            Config::get('db_name')
        );

        Lang::load(self::$router->getLanguage());

        $controller = self::$router->getController();
        $controller_class = ucfirst(strtolower($controller)).'Controller';

        $action_prefix = self::$router->getActionPrefix();
        $action = self::$router->getAction();
        $controller_action = strtolower($action_prefix.$action);

        $route = App::getRouter()->getRoute();

        if ($route == 'admin') {
            if (empty(Session::get('user'))) {
                Router::redirect('/users/login');
            } elseif (Session::get('role') != 'admin') {
                Router::redirect('/');
            }
        }

        $controller_object = new $controller_class();
        if (method_exists($controller_object, $controller_action)) {
            $view_path = $controller_object->$controller_action();
            $view_object = new View($controller_object->getData(), $view_path);
            $content = $view_object->render();
        } else {
            throw new Exception('Method '.$controller_action.' of class '.$controller_class.' does not exist');
        }

        $layout = $route;
        $layout_path = VIEWS_PATH.DS.$layout.'.php';
        //$layout_view_object = new View(['content' => $content], $layout_path);
        $layout_view_object = new View(compact('content'), $layout_path);
        echo $layout_view_object->render();
    }

    /**
     * @return mixed
     */
    public static function getDb()
    {
        return self::$db;
    }
}