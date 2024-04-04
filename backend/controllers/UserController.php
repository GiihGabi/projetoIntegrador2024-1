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
    
        if ($this->userModel->findByField('email', $email)) {
            return "Usuario já existe";
        } 
    
        $result = $this->userModel->create($username, $email, $password);
    
        if ($result) {
            return json_encode(array("message" => "Usuario registrado com sucesso"));
        } else {
            return json_encode(array("message" => "Erro ao registrar usuário"));
        }
    }

    

    // Métodos para operações do usuário (cadastro, atualização, exclusão, etc.)
}
