<?php
require_once ('config/config.php');
require_once ('./vendor/autoload.php');
require_once 'Router.php';
require_once ('./config/minio/s3.php');

// CORS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header("Access-Control-Allow-Credentials: true");

$db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
$router = new Router();

// Inclua as rotas
require_once('routes/api.php');
require_once('routes/auth.php');
require_once('routes/user.php');
require_once('routes/animal.php');

$router->run();
