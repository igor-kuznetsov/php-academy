<?php

/**
 * Class App
 */
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

    public static function getDb()
    {
        return self::$db;
    }

    /**
     * @param $uri
     * @throws Exception
     */
    public static function run($uri)
    {
        self::$router = new Router($uri);

        self::$db = new DB(
            Config::get('db.host'),
            Config::get('db.user'),
            Config::get('db.pass'),
            Config::get('db.name')
        );

        Lang::load(self::$router->getLanguage());

        $controller_class = ucfirst(self::$router->getController()).'Controller';
        $controller_action = strtolower(self::$router->getActionPrefix().self::$router->getAction());

        $layout = self::$router->getRoute();
        if ($layout == 'admin' && Session::get('role') != 'admin' && $controller_action != 'admin_login') {
            Router::redirect('/admin/users/login');
        }

        $controller_object = new $controller_class();

        if (method_exists($controller_object, $controller_action)) {
            $view_path = $controller_object->$controller_action();
            $view_object = new View($controller_object->getData(), $view_path);
            $content = $view_object->render();
        } else {
            throw new Exception('Method "'.$controller_action.'" of class "'.$controller_class.'" does not exist');
        }

        $layout_path = VIEWS_PATH.DS.$layout.'.php';
        $layout_view_object = new View(compact('content'), $layout_path);

        echo $layout_view_object->render();
    }
}