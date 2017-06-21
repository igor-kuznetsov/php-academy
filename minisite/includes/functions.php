<?php

session_start();

define('BASE_URL', 'http://localhost/lessons/minisite');

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
 * @return array
 */
function process_login():array
{
    $errors = [];

    if (isset($_POST['login'])) {
        $post = $_POST['login'];

        if (empty($post['email'])) {
            $errors['email'] = 'Email is required';
        }

        if (! filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Wrong email format';
        }

        if (empty($post['password'])) {
            $errors['password'] = 'Password is required';
        }

        if (empty($errors)) {
            $user = check_user($post['email'], $post['password']);

            if (empty($user)) {
                $errors['email'] = 'Wrong combination of email and password';
            } else {
                log_in($user);
                set_message('You have been logged in.');
//                set_message('Message #1');
//                set_message('Message #2');
//                set_message('Message #3');

                if (empty($_SESSION['login_redirect'])) {
                    header('Location: index.php');
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
function process_register():array
{
    $errors = [];

    if (isset($_POST['register'])) {
//        print "<pre>";
//        print_r($_POST);
//        print "</pre>";die;
        $post = $_POST['register'];

        if (empty($post['email'])) {
            $errors['email'] = 'Email is required';
        }

        if (! filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Wrong email format';
        }

        if (empty($post['password'])) {
            $errors['password'] = 'Password is required';
        }

        if ($post['confirm_password'] != $post['password']) {
            $errors['confirm_password'] = 'Passwords do not match';
        }

        if (empty($errors)) {
            if (is_user_exist($post['email'])) {
                $errors['email'] = 'User already exists';
            } else {
                $user = create_user($post['email'], $post['password']);
                log_in($user);
                set_message('You have been registered and logged in.');

                if (empty($_SESSION['login_redirect'])) {
                    header('Location: index.php');
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
function process_account():array
{
    $errors = [];

    if (isset($_POST['account'])) {
        $post = $_POST['account'];

        if (empty($post['color'])) {
            $errors['color'] = 'Color is required';
        }

        if (empty($errors)) {
            $user = get_user();
            $_SESSION['user'] = update_user(
                $user['email'],
                ['color' => $post['color']]
            );
            set_message('Content color has been updated.');
        }
    }

    return $errors;
}

/**
 * @return array
 */
function get_all_users():array
{
    $content = file_get_contents(data_path('users.txt'));
    if (empty($content)) {
        $users = [];
    } else {
        $users = unserialize($content);
    }
//    print "<pre>";
//    print_r($users);
//    print "</pre>";
//    die;

    return $users;
}

/**
 * @param string $user_email
 * @return bool
 */
function is_user_exist(string $user_email):bool
{
    return isset(get_all_users()[$user_email]);
}

/**
 * @param string $email
 * @param string $password
 * @return array
 */
function create_user(string $email, string $password):array
{
    $users = get_all_users();
    $users[$email] = [
        'email' => $email,
        'password' => encrypt_password($password),
        'color' => 'black'
    ];
    file_put_contents(data_path('users.txt'), serialize($users));

    return $users[$email];
}

/**
 * @param string $email
 * @param array $data
 * @return array
 */
function update_user(string $email, array $data = []):array
{
    $users = get_all_users();
    $users[$email] = array_merge($users[$email], $data);
    file_put_contents(data_path('users.txt'), serialize($users));

    return $users[$email];
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
function set_message(string $text)
{
    $_SESSION['messages'][] = $text;
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
 * @param string $email
 * @param string $password
 * @return array
 */
function check_user(string $email, string $password):array
{
    $users = get_all_users();
    if (isset($users[$email])
        && $users[$email]['password'] == encrypt_password($password)) {
        $user = $users[$email];
    } else {
        $user = [];
    }

    return $user;
}

/**
 * @param string $email
 * @return array
 */
function get_user(string $email = ''):array
{
    if (empty($email)) {
        $email = $_SESSION['user']['email'];
        //return $_SESSION['user'];
    }

    $users = get_all_users();

    return $users[$email];
}

/**
 * @param string $page_name
 * @return bool
 */
function is_page_exists(string $page_name):bool
{
    return is_file(pages_path($page_name.'.php'));
}

/**
 * @param array $errors
 * @param string $field
 */
function render_error(array $errors, string $field)
{
    if (isset($errors[$field])) {
        //echo "<span style='color:red;font-style:italic;'>$errors[$field]</span>";
        printf('<span style="color:red;font-style:italic;">%s</span>', $errors[$field]);
    }
}

/**
 * @param string $page_name
 */
function render_page(string $page_name)
{
    ob_start();
    include pages_path($page_name.'.php');
    echo ob_get_clean();
}

/**
 * @param string $file
 * @return string
 */
function pages_path(string $file):string
{
    //return __DIR__ . '/../pages/'.$file;

    return implode(DIRECTORY_SEPARATOR, [
        __DIR__,
        '..',
        'pages',
        $file
    ]);
}

/**
 * @param string $file
 * @return string
 */
function data_path(string $file):string
{
    return implode(DIRECTORY_SEPARATOR, [
        __DIR__,
        '..',
        'data',
        $file
    ]);
}