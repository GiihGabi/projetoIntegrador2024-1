<?php
require_once ('config/config.php');
require_once ('./vendor/autoload.php');
require_once 'Router.php';
require_once ('./controllers/AuthController.php');
require_once ('./controllers/UserController.php');


global $router;
global $db;

// Login
$router->post('/api/login', function () use ($db) {
    $data = json_decode(file_get_contents('php://input'), true);
    if (!isset ($data['email']) || !isset ($data['password'])) {
        return 'Erro: Dados incompletos';
    }

    $controller = new AuthController($db);
    return $controller->login($data['email'], $data['password']);
});

// Registro
$router->post('/api/register', function () use ($db) {
    $data = json_decode(file_get_contents('php://input'), true);
    if (!isset ($data['username']) || !isset ($data['password']) || !isset ($data['email'])) {
        return 'Erro: Dados incompletos';
    }

    $controller = new UserController($db);
    return $controller->register($data);
});
