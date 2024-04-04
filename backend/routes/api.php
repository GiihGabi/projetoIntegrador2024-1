<?php
require_once ('config/config.php');
require_once ('./vendor/autoload.php');
require_once 'Router.php';

// Inclua os controladores
require_once ('./controllers/AuthController.php');
require_once ('./controllers/UserController.php');

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header("Access-Control-Allow-Credentials: true");

$db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
$router = new Router();

//Rotas
$router->post('/api/register', 'registerUser');
$router->post('/api/login', 'loginUser');


//Funções das rotas
function registerUser() {
    global $db;

    $data = json_decode(file_get_contents('php://input'), true);
    if (!isset($data['username']) || !isset($data['password'])) {
        return 'Erro: Dados incompletos';
    }
    
    $controller = new UserController($db);
    return $controller->register($data);
}

function loginUser() {
    global $db;

    $data = json_decode(file_get_contents('php://input'), true);
    if (!isset($data['username']) || !isset($data['password'])) {
        return 'Erro: Dados incompletos';
    }
    
    $controller = new AuthController($db);
    return $controller->login($data['username'], $data['password']);
}

$router->get('/api/teste2', function () {
    return 'Rota de teste GET';
});

$router->post('/api/teste', function () {
    return 'Rota de teste POST';
});

$router->run();
