<?php

class Controller
{
    protected $data;
    protected $model;
    protected $params;

    /**
     * Controller constructor.
     * @param $data
     */
    public function __construct($data = [])
    {
        $this->data = $data;
        $this->params = App::getRouter()->getParams();
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }
}