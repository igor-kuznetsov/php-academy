<?php

class ContactsController extends Controller
{
    public function __construct($data = [])
    {
        parent::__construct($data);
        $this->model = new Message();
    }

    public function index()
    {
        if ($_POST) {
            $errors = [];

            if (empty($_POST['name'])) {
                $errors[] = 'Name is required';
            }

            if (empty($_POST['email'])) {
                $errors[] = 'Email is required';
            }

            if (empty($_POST['message'])) {
                $errors[] = 'Message is required';
            }

            if (empty($errors)) {
                if ($this->model->save($_POST)) {
                    Session::setFlash('Thank you! Your message was sent');
                } else {
                    Session::setFlash('DB error! Message was not saved');
                }
            } else {
                Session::setFlash('Validation errors:<br>'.implode('<br>', $errors));
            }
        }
    }

    public function admin_index()
    {
        $this->data['messages'] = $this->model->getList();
    }
}