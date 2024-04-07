<?php
class User
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function findByEmail($email)
    {
        $query = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $email, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return $result;
        } else {
            return null;
        }
    }

    public function findByField($field, $value)
    {
        $query = "SELECT * FROM users WHERE $field = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $value, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return $result;
        } else {
            return null;
        }
    }


    public function create($username, $email, $password, $zip_code, $user_level, $document, $profile_image)
    {
        try {
            $query = "INSERT INTO users (username, email, password, zip_code, registration_date, user_level, document, profile_image) VALUES (?, ?, ?, ?, NOW(), ?, ?, ?)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1, $username, PDO::PARAM_STR);
            $stmt->bindValue(2, $email, PDO::PARAM_STR);
            $stmt->bindValue(3, $password, PDO::PARAM_STR);
            $stmt->bindValue(4, $zip_code, PDO::PARAM_STR);
            $stmt->bindValue(5, $user_level, PDO::PARAM_STR);
            $stmt->bindValue(6, $document, PDO::PARAM_STR);
            $stmt->bindValue(7, $profile_image, PDO::PARAM_STR);

            if ($stmt->execute()) {
                return true;
            } else {
                // Se a execução falhar, retorna a mensagem de erro do PDO
                return $stmt->errorInfo()[2];
            }
        } catch (PDOException $e) {
            // Registra a exceção no arquivo de log do servidor
            error_log($e->getMessage());
            return false;
        }
    }
}
