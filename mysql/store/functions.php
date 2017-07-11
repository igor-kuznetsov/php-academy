<?php

require 'config.php';

session_start();

/**
 * @param string $path
 * @return string
 */
function site_url(string $path = ''):string
{
    $url = BASE_URL;

    if ($path && is_string($path)) {
        $url .= '/' . ltrim($path, '/');
    }

    return $url;
}

/**
 * @return bool
 */
function is_logged_in():bool
{
    return isset($_SESSION['user']);
}

/**
 * Logs user out
 */
function log_out()
{
    if (is_logged_in()) {
        unset($_SESSION['user']);
    }
}

/**
 * @param string $password
 * @param string $salt
 * @return string
 */
function encrypt_password(string $password, string $salt = 'xgBir7Na9'):string
{
    return md5($password . $salt);
}

/**
 * @param array $user
 */
function log_in(array $user)
{
    unset($user['password']);
    $_SESSION['user'] = $user;
}

/**
 * @param string $text
 */
function set_message(string $text, $type = 'general')
{
    $_SESSION['messages'][$type][] = $text;
}

/**
 * @return array
 */
function get_messages():array
{
    $messages = $_SESSION['messages'];
    unset($_SESSION['messages']);

    return $messages;
}

/**
 * @return bool
 */
function is_messages():bool
{
    return ! empty($_SESSION['messages']);
}

/**
 * @param string $login
 * @param string $password
 * @return array
 */
function check_user(string $login, string $password):array
{
    $query = "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '".encrypt_password($password)."';";
    $user = db_select($query);

    if (empty($user)) {
        $user = [];
    } else {
        $user = $user[0];
    }

    return $user;
}

/**
 * @param array $errors
 * @param string $field
 */
function render_error(array $errors, string $field)
{
    if (isset($errors[$field])) {
        printf('<span style="color:red;font-style:italic;">%s</span>', $errors[$field]);
    }
}

/**
 * @param int $page
 * @return array
 */
function get_products($page):array
{
    $offset = ($page - 1) * ITEMS_PER_PAGE;
    $limit = ITEMS_PER_PAGE;

    $query = "SELECT `p`.`id`, `p`.`name`, `p`.`price`, `c`.`name` as `category`
              FROM `products` AS `p`
              JOIN `categories` AS `c` ON `p`.`category_id` = `c`.`id`
              LIMIT $offset,$limit;";

    return db_select($query);
}

/**
 * @return array
 */
function get_all_products():array
{
    $query = "SELECT `p`.`id`, `p`.`name`, `p`.`price`, `c`.`name` as `category`
              FROM `products` AS `p`
              JOIN `categories` AS `c` ON `p`.`category_id` = `c`.`id`;";

    return db_select($query);
}

/**
 * @return array
 */
function get_products_pagination():array
{
    $links = [];
    $products_count = db_select("SELECT COUNT(`id`) AS `count` FROM `products`;")[0]['count'];

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
function get_categories():array
{
    $query = "SELECT * FROM `categories`;";

    return db_select($query);
}

/**
 * @param string $query
 * @return array
 */
function db_select(string $query):array
{
    $result = [];

    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if (mysqli_connect_errno()) {
        printf("Database connection error. Error code: %s\n", mysqli_connect_error());
        exit;
    }

    if ($query_result = mysqli_query($connection, $query)) {
        // option #1
        while ($row = mysqli_fetch_assoc($query_result)) {
            $result[] = $row;
        }

        // option #2 (doesn't work for us)
        //$result = mysqli_fetch_all($query_result);

        mysqli_free_result($query_result);
    }

    mysqli_close($connection);

    return $result;
}

/**
 * @param string $query
 * @return bool
 */
function db_query(string $query):bool
{
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if (mysqli_connect_errno()) {
        printf("Database connection error. Error code: %s\n", mysqli_connect_error());
        exit;
    }

    $result = mysqli_query($connection, $query);

    mysqli_close($connection);

    return $result;
}

/**
 * @return array
 */
function process_add_product():array
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
            $is_added = add_product($post);

            if ($is_added) {
                set_message('Product has been added.');
                header('Location: '.site_url('admin/products'));
                exit;
            } else {
                set_message('Unexpected error!', 'error');
            }
        }
    }

    return $errors;
}

/**
 * @return array
 */
function process_edit_product():array
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
            $is_edited = edit_product($post);

            if ($is_edited) {
                set_message('Product has been updated.');
                header('Location: '.site_url('admin/products'));
                exit;
            } else {
                set_message('Unexpected error!', 'error');
            }
        }
    }

    return $errors;
}

/**
 * @param array $data
 * @return bool
 */
function add_product(array $data):bool
{
    extract($data);

    $query = "INSERT INTO `products` (`name`, `description`, `price`, `category_id`)
              VALUES ('$name','$description',$price,$category_id);";

    return db_query($query);
}

/**
 * @param array $data
 * @return bool
 */
function edit_product(array $data):bool
{
    extract($data);

    $query = "UPDATE `products`
              SET `name`='$name', `description`='$description', `price`=$price, `category_id`=$category_id
              WHERE `id` = $id;";

    return db_query($query);
}

/**
 * @param int $id
 */
function delete_product(int $id)
{
    $query = "DELETE FROM `products` WHERE `id` = $id;";
    db_query($query);
}

/**
 * @param int $id
 * @return array
 */
function get_product(int $id):array
{
    $query = "SELECT `p`.*, `c`.`name` as `category`
              FROM `products` AS `p`
              JOIN `categories` AS `c` ON `p`.`category_id` = `c`.`id`
              WHERE `p`.`id` = $id;";
    $product = db_select($query);

    if (empty($product)) {
        $product = [];
    } else {
        $product = $product[0];
    }

    return $product;
}

/**
 * @return array
 */
function process_login():array
{
    $errors = [];

    if (isset($_POST['login'])) {
        $post = $_POST['login'];

        if (empty($post['login'])) {
            $errors['login'] = 'Login is required';
        }

        if (empty($post['password'])) {
            $errors['password'] = 'Password is required';
        }

        if (empty($errors)) {
            $user = check_user($post['login'], $post['password']);

            if (empty($user)) {
                $errors['login'] = 'Wrong combination of login and password';
            } else {
                log_in($user);
                set_message('You have been logged in.');

                if (empty($_SESSION['login_redirect'])) {
                    header('Location: '.site_url('admin'));
                } else {
                    header('Location: '.$_SESSION['login_redirect']);
                    unset($_SESSION['login_redirect']);
                }

                exit;
            }
        }
    }

    return $errors;
}

/**
 * @return array
 */
function process_add_category():array
{
    $errors = [];

    if (isset($_POST['category'])) {
        $post = $_POST['category'];

        if (empty($post['name'])) {
            $errors['name'] = 'Name is required';
        }

        if (empty($errors)) {
            $is_added = add_category($post);

            if ($is_added) {
                set_message('Category has been added.');
                header('Location: '.site_url('admin/categories'));
                exit;
            } else {
                set_message('Unexpected error!', 'error');
            }
        }
    }

    return $errors;
}

/**
 * @return array
 */
function process_edit_category():array
{
    $errors = [];

    if (isset($_POST['category'])) {
        $post = $_POST['category'];

        if (empty($post['name'])) {
            $errors['name'] = 'Name is required';
        }

        if (empty($errors)) {
            $is_edited = edit_category($post);

            if ($is_edited) {
                set_message('Category has been updated.');
                header('Location: '.site_url('admin/categories'));
                exit;
            } else {
                set_message('Unexpected error!', 'error');
            }
        }
    }

    return $errors;
}

/**
 * @param array $data
 * @return bool
 */
function add_category(array $data):bool
{
    extract($data);

    $query = "INSERT INTO `categories` (`name`) VALUES ('$name');";

    return db_query($query);
}

/**
 * @param array $data
 * @return bool
 */
function edit_category(array $data):bool
{
    extract($data);

    $query = "UPDATE `categories` SET `name` = '$name' WHERE `id` = $id;";

    return db_query($query);
}

/**
 * @param int $id
 */
function delete_category(int $id)
{
    $query = "DELETE FROM `categories` WHERE `id` = $id;";
    db_query($query);
}

/**
 * @param int $id
 * @return array
 */
function get_category(int $id):array
{
    $query = "SELECT * FROM `categories` WHERE `id` = $id;";
    $category = db_select($query);

    if (empty($category)) {
        $category = [];
    } else {
        $category = $category[0];
    }

    return $category;
}

/**
 * @return array
 */
function get_cart():array
{
    return empty($_SESSION[CART]) ? [] : $_SESSION[CART];
}

/**
 * @param int $id
 */
function add_to_cart(int $id)
{
    $products = get_cart();

    if (! in_array($id, $products)) {
        $products[] = $id;
    }

    $_SESSION[CART] = $products;
}

/**
 * @param int $id
 */
function remove_from_cart(int $id)
{
    $products = get_cart();

    $key = array_search($id, $products);
    if ($key !== false) {
        unset($products[$key]);
    }

    $_SESSION[CART] = $products;
}

/**
 * @return void
 */
function clear_cart()
{
    if (isset($_SESSION[CART])) {
        unset($_SESSION[CART]);
    }
}

/**
 * @return int
 */
function get_cart_count():int
{
    return count(get_cart());
}

/**
 * @return array
 */
function get_cart_products():array
{
    $cart = get_cart();
    if (empty($cart)) {
        $products = [];
    } else {
        $ids = implode(',', $cart);
        $query = "SELECT `p`.*, `c`.`name` AS `category`
            FROM `products` AS `p`
            JOIN `categories` AS `c` ON `p`.`category_id` = `c`.`id`
            WHERE `p`.`id` IN ($ids);";

        $products = db_select($query);
    }

    return $products;
}

/**
 * @param mixed $value
 */
function debug($value)
{
    echo "<pre>";

    if (is_array($value)) {
        print_r($value);
    } else {
        var_dump($value);
    }

    echo "</pre>";
}