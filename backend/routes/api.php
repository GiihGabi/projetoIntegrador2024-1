<?php
require_once ('./controllers/AuthController.php');
require_once('./controllers/UserController.php');
require_once('./vendor/autoload.php'); // Inclui o autoloader do Composer
require_once('config/config.php');


use \Firebase\JWT\JWT; // Importa a classe JWT

$db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);


// Criar instâncias dos controladores
$authController = new AuthController($db);
$userController = new UserController($db);
$array = array('HS256');

// Rotas de autenticação
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_SERVER['REQUEST_URI'] == '/api/login') {
        // Rota para login
        $data = json_decode(file_get_contents('php://input'), true);
        echo $authController->login($data['username'], $data['password']);
    } elseif ($_SERVER['REQUEST_URI'] == '/api/register') {
        // Rota para registro
        $data = json_decode(file_get_contents('php://input'), true);
        echo $userController->register($data);
    } elseif ($_SERVER['REQUEST_URI'] == '/api/teste') {
        // Rota para teste        $data = json_decode(file_get_contents('php://input'), true);
        echo $authController->create($data);
    }
}

// Outras rotas do usuário podem ser definidas aqui
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $headers = getallheaders();
    $token = $headers['Authorization'];

    try {
        $decoded = JWT::decode($token, $key, $array);
        // O token é válido, permitir acesso à rota
    } catch (Exception $e) {
        http_response_code(401); // Token inválido, retorne um status 401 Unauthorized
        echo json_encode(array("message" => "Token inválido"));
        exit();
    }
}
