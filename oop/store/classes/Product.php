<?php

/**
 * Class Product
 */
class Product extends Entity
{
    public $category;

    /**
     * @return string
     */
    protected static function getTable()
    {
        return 'products';
    }

    /**
     * @return array
     */
    protected static function getColumns()
    {
        return [
            'id',
            'name',
            'description',
            'price',
            'category_id',
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
            $this->description = $data['description'] ?? null;
            $this->price = $data['price'] ?? null;
            $this->category_id = $data['category_id'] ?? null;
            $this->category = $this->getCategoryName();
        }
    }

    /**
     * @return string
     */
    public function getCategoryName()
    {
        $db = DbManager::getInstance();

        $query = "SELECT `c`.`name` AS `category`
                  FROM `products` AS `p`
                  JOIN `categories` AS `c` ON `p`.`category_id` = `c`.`id`
                  WHERE `p`.`id` = $this->id;";

        return $db->getPdo()->query($query)->fetch(0)['category'];
    }

    /**
     * @return array
     */
    public static function getPagination():array
    {
        $links = [];
        $db = DbManager::getInstance();

        $query = "SELECT COUNT(`id`) AS `products_count` FROM `products`;";
        $products_count = $db->getPdo()->query($query)->fetch(0)['products_count'];

        if ($products_count > ITEMS_PER_PAGE) {
            $pages = ceil($products_count / ITEMS_PER_PAGE);
            for ($i = 1; $i <= $pages; $i++) {
                $links[] = [
                    'name' => $i,
                    'href' => site_url('index.php?page='.$i),
                ];
            }
        }

        return $links;
    }

    /**
     * @return array
     */
    public static function add()
    {
        $errors = [];

        if (isset($_POST['product'])) {
            $post = $_POST['product'];

            if (empty($post['name'])) {
                $errors['name'] = 'Name is required';
            }

            if (empty($post['price'])) {
                $errors['price'] = 'Price is required';
            }

            if (empty($post['category_id'])) {
                $errors['category_id'] = 'Category is required';
            }

            if (empty($errors)) {
                $is_added = static::create($post);

                if ($is_added) {
                    Message::set('Product has been added.');
                    header('Location: '.site_url('admin/products'));
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

        if (isset($_POST['product'])) {
            $post = $_POST['product'];

            if (empty($post['name'])) {
                $errors['name'] = 'Name is required';
            }

            if (empty($post['price'])) {
                $errors['price'] = 'Price is required';
            }

            if (empty($post['category_id'])) {
                $errors['category_id'] = 'Category is required';
            }

            if (empty($errors)) {
                $is_edited = static::update($post);

                if ($is_edited) {
                    Message::set('Product has been updated.');
                    header('Location: '.site_url('admin/products'));
                    exit;
                } else {
                    Message::set('Unexpected error!', Message::TYPE_ERROR);
                }
            }
        }

        return $errors;
    }
}
