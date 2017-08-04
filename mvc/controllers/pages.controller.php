<?php

class PagesController extends Controller
{
    public function index()
    {
        $this->data['page_content'] = 'Test content for index page';

        return VIEWS_PATH.DS.'test'.DS.'test.php';
    }

    public function admin_index()
    {
        //
    }

    public function view()
    {
        if (isset($this->params[0])) {
            $page_name = strtolower($this->params[0]);
            $this->data['page_content'] =  'Page "'.$page_name.'"';
        } else {
            throw new Exception('Page name is required');
        }
    }
}