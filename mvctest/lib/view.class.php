<?php

/**
 * Class View
 */
class View
{
    protected $data;
    protected $path;

    /**
     * @param array $data
     * @param null $path
     * @throws Exception
     */
    public function __construct($data = [], $path = null)
    {
        if (!$path) {
            $path = self::getDefaultViewPath();
        }

        if (!file_exists($path)) {
            throw new Exception('Template file is not found in path "'.$path.'"');
        }

        $this->data = $data;
        $this->path = $path;
    }

    /**
     * @return string
     */
    public function render()
    {
        $data = $this->data;
        ob_start();
        include($this->path);
        $content = ob_get_clean();

        return $content;
    }

    /**
     * @return string
     * @throws Exception
     */
    public static function getDefaultViewPath()
    {
        $router = App::getRouter();
        if (!$router) {
            throw new Exception('Router error');
        }

        $template_dir = $router->getController();
        $template_name = $router->getActionPrefix() . $router->getAction() . '.php';

        return VIEWS_PATH.DS.$template_dir.DS.$template_name;
    }
}