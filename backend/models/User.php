<?php
class User {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }
    // Métodos para interagir com a tabela de usuários
    public function findByUsername($username) {
        $query = "SELECT * FROM users WHERE username = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $username, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    public function create($username, $email, $password) {
        return $username ."". $email ."". $password ."";
    }
}
