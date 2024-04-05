<?php
require_once('./models/User.php');

class UserController {
    private $userModel;

    public function __construct($db) {
        $this->userModel = new User($db);
    }

    public function register($data) {
        $username = filter_var($data['username'], FILTER_SANITIZE_STRING);
        $email = filter_var($data['email'], FILTER_VALIDATE_EMAIL);
        $password = password_hash($data['password'], PASSWORD_DEFAULT);
        $zip_code = isset($data['zip_code']) ? filter_var($data['zip_code'], FILTER_SANITIZE_STRING) : null;
        $user_level = isset($data['user_level']) ? filter_var($data['user_level'], FILTER_SANITIZE_STRING) : null;
        $document = isset($data['document']) ? filter_var($data['document'], FILTER_SANITIZE_STRING) : null;
        $profile_image = isset($data['profile_image']) ? filter_var($data['profile_image'], FILTER_SANITIZE_STRING) : null;
    
        // Verifica se o e-mail já está em uso
        if ($this->userModel->findByField('email', $email)) {
            return $this->errorResponse("Usuário já existe", 400);
        } 
    
        // Tenta criar o usuário com todas as informações necessárias
        $result = $this->userModel->create($username, $email, $password, $zip_code, $user_level, $document, $profile_image);
    
        if ($result === true) {
            return $this->successResponse("Usuário registrado com sucesso");
        } else {
            return $this->errorResponse("Erro ao registrar usuário", 500);
        }
    }
    
    // Função para criar uma resposta de sucesso
    private function successResponse($message) {
        return json_encode(array("success" => true, "message" => $message));
    }
    
    // Função para criar uma resposta de erro
    private function errorResponse($message, $statusCode) {
        http_response_code($statusCode);
        return json_encode(array("success" => false, "error" => $message));
    }
    
    
    

    // Métodos para operações do usuário (cadastro, atualização, exclusão, etc.)
}
