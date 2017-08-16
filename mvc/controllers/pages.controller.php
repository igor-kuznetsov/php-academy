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
            if (empty($this->data['page'])) {
                throw new Exception('Page not found');
            }
        } else {
            throw new Exception('Page name is required');
        }
    }

    public function admin_index()
    {
        $this->data['pages'] = $this->model->getList(false);
    }

    public function admin_edit()
    {
        if ($_POST) {
            $errors = [];

            if (empty($_POST['alias'])) {
                $errors[] = 'Alias is required';
            }

            if (empty($_POST['title'])) {
                $errors[] = 'Title is required';
            }

            if (empty($_POST['content'])) {
                $errors[] = 'Content is required';
            }

            if (empty($errors)) {
                if ($this->model->save($_POST, $_POST['id'])) {
                    Session::setFlash('Page was edited');
                } else {
                    Session::setFlash('DB error! Page was not saved');
                }

                Router::redirect('/admin/pages');
            } else {
                Session::setFlash('Validation errors:<br>'.implode('<br>', $errors));
            }
        }

        if (isset($this->params[0])) {
            $id = (int) $this->params[0];
            $this->data['page'] = $this->model->getById($id);
        } else {
            throw new Exception('Empty page ID');
        }
    }

    public function admin_delete()
    {
        if (isset($this->params[0])) {
            $id = (int) $this->params[0];
            $this->model->deleteById($id);
        } else {
            throw new Exception('Empty page ID');
        }

        Router::redirect('/admin/pages');
    }

    public function admin_add()
    {
        if ($_POST) {
            $errors = [];

            if (empty($_POST['alias'])) {
                $errors[] = 'Alias is required';
            }

            if (empty($_POST['title'])) {
                $errors[] = 'Title is required';
            }

            if (empty($_POST['content'])) {
                $errors[] = 'Content is required';
            }

            if (empty($errors)) {
                if ($this->model->save($_POST)) {
                    Session::setFlash('Page was created');
                } else {
                    Session::setFlash('DB error! Page was not saved');
                }

                Router::redirect('/admin/pages');
            } else {
                Session::setFlash('Validation errors:<br>'.implode('<br>', $errors));
            }
        }
    }
}