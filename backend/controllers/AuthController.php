<?php
require_once('./models/User.php');
require_once('./vendor/autoload.php'); // Inclui o autoloader do Composer

use \Firebase\JWT\JWT; // Importa a classe JWT

class AuthController {
    private $userModel;
    private $key = "sua_chave_secreta_aqui";

    public function __construct($db) {
        $this->userModel = new User($db);
    }

    public function login($username, $password) {
        // Verificar as credenciais no banco de dados
        $user = $this->userModel->findByUsername($username); // Supondo que este método busca o usuário pelo nome de usuário
    
        // Verificar se o usuário existe e se a senha está correta
        if (!$user || !password_verify($password, $user['password'])) {
            return json_encode(array("message" => "Credenciais inválidas"));
        }
    
        // Se as credenciais forem válidas, gerar um token JWT
        $user_id = $user['id']; 
        $token = JWT::encode(array("user_id" => $user_id), $this->key, 'HS256');
        return json_encode(array("token" => $token));
    }
    

}
