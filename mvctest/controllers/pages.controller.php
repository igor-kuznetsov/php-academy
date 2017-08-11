<?php

/**
 * Class PagesController
 */
class PagesController extends Controller
{
    /**
     * PagesController constructor
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
        $params = App::getRouter()->getParams();
        if (isset($params[0])) {
            $alias = strtolower($params[0]);
            $this->data['page'] = $this->model->getByAlias($alias);
        } else {
            throw new Exception('Page alias is required');
        }
    }

    public function admin_index()
    {
        $this->data['pages'] = $this->model->getList();
    }

    public function admin_edit()
    {
        if ($_POST) {
            $errors = [];
            if (empty($_POST['alias'])) {
                $errors[] = 'Page alias is required!';
            }

            if (empty($_POST['title'])) {
                $errors[] = 'Page title is required!';
            }

            if (empty($_POST['content'])) {
                $errors[] = 'Page content is required!';
            }

            if (empty($errors)) {
                if ($this->model->save($_POST, $_POST['id'])) {
                    Session::setFlash('Page has been edited.');
                } else {
                    Session::setFlash('Unexpected error! Page was not edited.');
                }

                Router::redirect('/admin/pages');
            } else {
                Session::setFlash('Validation errors:<br>'.implode('<br>',$errors));
            }
        }

        if (isset($this->params[0])) {
            $this->data['page'] = $this->model->getById($this->params[0]);
        } else {
            Session::setFlash('Wrong page ID');
            Router::redirect('/admin/pages');
        }
    }

    public function admin_add()
    {
        if ($_POST) {
            $errors = [];
            if (empty($_POST['alias'])) {
                $errors[] = 'Page alias is required!';
            }

            if (empty($_POST['title'])) {
                $errors[] = 'Page title is required!';
            }

            if (empty($_POST['content'])) {
                $errors[] = 'Page content is required!';
            }

            if (empty($errors)) {
                if ($this->model->save($_POST)) {
                    Session::setFlash('New page has been created.');
                } else {
                    Session::setFlash('Unexpected error! Page was not created.');
                }

                Router::redirect('/admin/pages');
            } else {
                Session::setFlash('Validation errors:<br>'.implode('<br>',$errors));
            }
        }
    }

    public function admin_delete()
    {
        if (isset($this->params[0])) {
            if ($this->model->delete($this->params[0])) {
                Session::setFlash('Page has been deleted.');
            } else {
                Session::setFlash('Unexpected error! Page was not deleted.');
            }

            Router::redirect('/admin/pages');
        }
    }
}