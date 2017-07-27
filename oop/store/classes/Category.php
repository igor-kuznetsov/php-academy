<?php

/**
 * Class Category
 */
class Category extends Entity
{
    /**
     * @return string
     */
    protected static function getTable()
    {
        return 'categories';
    }

    /**
     * @return array
     */
    protected static function getColumns()
    {
        return [
            'id',
            'name'
        ];
    }

    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        if (is_array($data) && !empty($data)) {
            $this->id = $data['id'] ?? null;
            $this->name = $data['name'] ?? null;
        }
    }

    /**
     * @return array
     */
    public static function add()
    {
        $errors = [];

        if (isset($_POST['category'])) {
            $post = $_POST['category'];

            if (empty($post['name'])) {
                $errors['name'] = 'Name is required';
            }

            if (empty($errors)) {
                $is_added = static::create($post);

                if ($is_added) {
                    Message::set('Category has been added.');
                    header('Location: '.site_url('admin/categories'));
                    exit;
                } else {
                    Message::set('Unexpected error!', Message::TYPE_ERROR);
                }
            }
        }

        return $errors;
    }

    /**
     * @return array
     */
    public static function edit()
    {
        $errors = [];

        if (isset($_POST['category'])) {
            $post = $_POST['category'];

            if (empty($post['name'])) {
                $errors['name'] = 'Name is required';
            }

            if (empty($errors)) {
                $is_edited = static::update($post);

                if ($is_edited) {
                    Message::set('Category has been updated.');
                    header('Location: '.site_url('admin/categories'));
                    exit;
                } else {
                    Message::set('Unexpected error!', Message::TYPE_ERROR);
                }
            }
        }

        return $errors;
    }
}
