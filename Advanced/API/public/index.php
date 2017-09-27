<?php

namespace Advanced\API;

require_once '../vendor/autoload.php';

use Advanced\API\Classes\Users;
use Advanced\API\Classes\Tasks;
use Dompdf\Exception;
use mysqli;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\App;

$config = [];
$config['settings']['displayErrorDetails'] = true;
$config['settings']['db']['host'] = "localhost";
$config['settings']['db']['user'] = "root";
$config['settings']['db']['pass'] = "";
$config['settings']['db']['dbname'] = "task_manager";

$app = new App($config);

$container = $app->getContainer();
$container['db'] = function ($config) {
    $db = $config['settings']['db'];
    $mysqli = new mysqli(
        $db['host'],
        $db['user'],
        $db['pass'],
        $db['dbname']
    );

    if ($mysqli->connect_errno) {
        throw new Exception($mysqli->connect_error);
    }

    return $mysqli;
};

// API calls without authentication

$app->post('/register', function (Request $request, Response $response, $args) {
    $user = new Users($this->db);
    $data = $request->getParsedBody();
    $result = $user->validateRegister($data);
    if ($result['success']) {
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = $data['password'];
        $result = $user->create();
    }

    return $response->withJson($result, $result['status']);
});

$app->post('/login', function (Request $request, Response $response, $args) {
    $user = new Users($this->db);
    $data = $request->getParsedBody();
    $result = $user->validateLogin($data);
    if ($result['success']) {
        $user->email = $data['email'];
        $user->password = $data['password'];
        $result = $user->login();
    }

    return $response->withJson($result, $result['status']);
});

// API calls with authentication

$app->post('/tasks', function (Request $request, Response $response, $args) {
    $result = [
        'success' => true,
        'errors' => [],
        'status' => 201,
        'data' => []
    ];

    $user = new Users($this->db);
    $api_key = (string) $request->getHeaderLine('Authorization');
    if (empty($api_key)) {
        $result['success'] = false;
        $result['errors'][] = 'Authorization is required';
        $result['status'] = 403;
    } else {
        $currentUser = $user->getByApiKey($api_key);
        if ($currentUser['success']) {
            $task = new Tasks($this->db);
            $data = $request->getParsedBody();
            $result = $task->validate($data);
            if ($result['success']) {
                $task->task = $data['task'];
                $task->user_id = $currentUser['data']['id'];
                $result = $task->create();
            }
        } else {
            $result['success'] = false;
            $result['errors'][] = 'Wrong API key';
            $result['status'] = 401;
        }
    }

    return $response->withJson($result, $result['status']);
});

$app->get('/tasks', function (Request $request, Response $response, $args) {
    $result = [
        'success' => true,
        'errors' => [],
        'status' => 201,
        'data' => []
    ];

    $user = new Users($this->db);
    $api_key = (string) $request->getHeaderLine('Authorization');
    if (empty($api_key)) {
        $result['success'] = false;
        $result['errors'][] = 'Authorization is required';
        $result['status'] = 403;
    } else {
        $currentUser = $user->getByApiKey($api_key);
        if ($currentUser['success']) {
            $task = new Tasks($this->db);
            $result = $task->all();
        } else {
            $result['success'] = false;
            $result['errors'][] = 'Wrong API key';
            $result['status'] = 401;
        }
    }

    return $response->withJson($result, $result['status']);
});

$app->get('/tasks/{id}', function (Request $request, Response $response, $args) {
    $result = [
        'success' => true,
        'errors' => [],
        'status' => 200,
        'data' => []
    ];

    $user = new Users($this->db);
    $api_key = (string) $request->getHeaderLine('Authorization');
    if (empty($api_key)) {
        $result['success'] = false;
        $result['errors'][] = 'Authorization is required';
        $result['status'] = 403;
    } else {
        $currentUser = $user->getByApiKey($api_key);
        if ($currentUser['success']) {
            $task = new Tasks($this->db);
            $task->id = (int) $request->getAttribute('id');
            $result = $task->read();
        } else {
            $result['success'] = false;
            $result['errors'][] = 'Wrong API key';
            $result['status'] = 401;
        }
    }

    return $response->withJson($result, $result['status']);
});

$app->put('/tasks/{id}', function (Request $request, Response $response, $args) {
    $result = [
        'success' => true,
        'errors' => [],
        'status' => 200,
        'data' => []
    ];

    $user = new Users($this->db);
    $api_key = (string) $request->getHeaderLine('Authorization');
    if (empty($api_key)) {
        $result['success'] = false;
        $result['errors'][] = 'Authorization is required';
        $result['status'] = 403;
    } else {
        $currentUser = $user->getByApiKey($api_key);
        if ($currentUser['success']) {
            $task = new Tasks($this->db);
            $task->id = (int) $request->getAttribute('id');
            $data = $request->getParsedBody();
            $result = $task->validate($data);
            if ($result['success']) {
                $task->task = $data['task'];
                $task->status = $data['status'];
                $result = $task->update();
            }
        } else {
            $result['success'] = false;
            $result['errors'][] = 'Wrong API key';
            $result['status'] = 401;
        }
    }

    return $response->withJson($result, $result['status']);
});

$app->delete('/tasks/{id}', function (Request $request, Response $response, $args) {
    $result = [
        'success' => true,
        'errors' => [],
        'status' => 200,
        'data' => []
    ];

    $user = new Users($this->db);
    $api_key = (string) $request->getHeaderLine('Authorization');
    if (empty($api_key)) {
        $result['success'] = false;
        $result['errors'][] = 'Authorization is required';
        $result['status'] = 403;
    } else {
        $currentUser = $user->getByApiKey($api_key);
        if ($currentUser['success']) {
            $task = new Tasks($this->db);
            $task->id = (int) $request->getAttribute('id');
            $result = $task->delete();
        } else {
            $result['success'] = false;
            $result['errors'][] = 'Wrong API key';
            $result['status'] = 401;
        }
    }

    return $response->withJson($result, $result['status']);
});

$app->run();