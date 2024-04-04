<?php
require_once('./models/User.php');

class UserController {
    private $userModel;

    public function __construct($db) {
        $this->userModel = new User($db);
    }

    public function register($data) {
        // Validar entrada
        $username = filter_var($data['username'], FILTER_SANITIZE_STRING);
        $email = filter_var($data['email'], FILTER_VALIDATE_EMAIL);
        $password = password_hash($data['password'], PASSWORD_DEFAULT);
    
        // Verificar se o usuário já existe no banco de dados
        if ($this->userModel->findByUsername($username)) {
            return json_encode(array("message" => "Nome de usuário já está em uso"));
        }
    
        // Salvar o usuário no banco de dados com a senha hash
        $result = $this->userModel->create($username, $email, $password);
    
        if ($result) {
            return json_encode(array("message" => "Usuário registrado com sucesso"));
        } else {
            return json_encode(array("message" => "Erro ao registrar usuário"));
        }
    }

    

    // Métodos para operações do usuário (cadastro, atualização, exclusão, etc.)
}
