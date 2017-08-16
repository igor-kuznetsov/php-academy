<?php

class UsersController extends Controller
{
    public function __construct($data = [])
    {
        parent::__construct($data);
        $this->model = new User();
    }

    public function login()
    {
        if ($_POST) {
            $errors = [];

            if (empty($_POST['login'])) {
                $errors[] = 'Login is required';
            }

            if (empty($_POST['password'])) {
                $errors[] = 'Password is required';
            }

            if (empty($errors)) {
                $user = $this->model->getByLogin($_POST['login']);
                $hash = md5(Config::get('salt').$_POST['password']);
                if (!empty($user) && $hash == $user['password']) {
                    Session::set('user', $user['id']);
                    Session::set('role', $user['role']);
                    Router::redirect('/');
                } else {
                    Session::setFlash('Wrong login credentials');
                }
            } else {
                Session::setFlash('Validation errors:<br>'.implode('<br>', $errors));
            }
        }
    }

    public function logout()
    {
        Session::clear('user');
        Session::clear('role');
        Router::redirect('/');
    }
}