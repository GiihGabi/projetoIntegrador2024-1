<?php
require_once ('config/config.php');
require_once ('./vendor/autoload.php');
require_once 'Router.php';
require_once ('./config/minio/s3.php');
require_once ('./controllers/UserController.php');


global $router;
global $db;

// Buscar usuário por ID
$router->get('/api/users/{id}', function ($id) use ($db) {
    // $controller = new UserController($db);
    // return $controller->getUserById($id);
});

// Buscar usuário por ID
$router->get('/api/users/', function ($id) use ($db) {
    // $controller = new UserController($db);
    // return $controller->getUserById($id);
});

// Atualizar dados do usuário
$router->put('/api/users/{id}', function ($id) use ($db) {
    // $data = json_decode(file_get_contents('php://input'), true);
    // $controller = new UserController($db);
    // return $controller->updateUser($id, $data);
});

// Excluir usuário
$router->delete('/api/users/{id}', function ($id) use ($db) {
    // $controller = new UserController($db);
    // return $controller->deleteUser($id);
});
