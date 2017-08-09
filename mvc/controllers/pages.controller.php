<?php

class PagesController extends Controller
{
    /**
     * PagesController constructor.
     * @param array $data
     */
    public function __construct($data = [])
    {
        parent::__construct($data);
        $this->model = new Page();
    }

    public function index()
    {
        $this->data['pages'] = $this->model->getList();
    }

    public function view()
    {
        if (isset($this->params[0])) {
            $alias = strtolower($this->params[0]);
            $this->data['page'] =  $this->model->getByAlias($alias);
        } else {
            throw new Exception('Page name is required');
        }
    }

    public function admin_index()
    {
        $this->data['pages'] = $this->model->getList();
    }

    public function admin_edit()
    {

    }

    public function admin_delete()
    {

    }

    public function admin_add()
    {

    }
}