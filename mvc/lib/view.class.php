<?php

class View
{
    protected $data;
    protected $path;

    /**
     * View constructor.
     * @param array $data
     * @param string $path
     * @throws Exception
     */
    public function __construct($data = [], $path = '')
    {
        if (empty($path)) {
            $path = self::getDefaultPath();
        }

        if (!file_exists($path)) {
            throw new Exception('Template file is not found in path: '.$path);
        }

        $this->data = $data;
        $this->path = $path;
    }

    public static function getDefaultPath()
    {
        $router = App::getRouter();
        $template_dir = $router->getController();
        $template_name = $router->getActionPrefix().$router->getAction().'.php';

        return VIEWS_PATH.DS.$template_dir.DS.$template_name;
    }

    public function render()
    {
        $data = $this->data;
        ob_start();
        include $this->path;
        $content = ob_get_clean();

        return $content;
    }
}