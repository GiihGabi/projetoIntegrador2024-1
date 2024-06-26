<?php
class Animal
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Método para encontrar um animal pelo ID
    public function findById($id)
    {
        $query = "SELECT * FROM animals WHERE id_animal = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return $result;
        } else {
            return null;
        }
    }

    public function getAll()
    {
        $query = "SELECT * FROM animals";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    // Método para encontrar animais por determinado campo
    public function findByField($field, $value)
    {
        $query = "SELECT * FROM animals WHERE $field = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $value, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($result) {
            return $result;
        } else {
            return null;
        }
    }

    // Método para criar um novo animal
    public function create($name, $age, $gender, $description, $size, $weight, $temperament, $publication_date, $status_id, $owner_id, $species_id)
    {
        try {
            $query = "INSERT INTO animals (animal_name, age, gender, description, size, weight, temperament, publication_date, status_id, owner_id, species_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1, $name, PDO::PARAM_STR);
            $stmt->bindValue(2, $age, PDO::PARAM_INT);
            $stmt->bindValue(3, $gender, PDO::PARAM_STR);
            $stmt->bindValue(4, $description, PDO::PARAM_STR);
            $stmt->bindValue(5, $size, PDO::PARAM_STR);
            $stmt->bindValue(6, $weight, PDO::PARAM_STR);
            $stmt->bindValue(7, $temperament, PDO::PARAM_STR);
            $stmt->bindValue(8, $publication_date, PDO::PARAM_STR);
            $stmt->bindValue(9, $status_id, PDO::PARAM_INT);
            $stmt->bindValue(10, $owner_id, PDO::PARAM_INT);
            $stmt->bindValue(11, $species_id, PDO::PARAM_INT);

            if ($stmt->execute()) {
                return $this->conn->lastInsertId();
            } else {
                return $stmt->errorInfo()[2];
            }
        } catch (PDOException $e) {

            error_log($e->getMessage());
            return false;
        }


    }
    // private function insertImagePath($animal_id, $imagePath)
    // {
    //     $query = "INSERT INTO animal_images (animal_id, image_path) VALUES (?, ?)";
    //     $stmt = $this->conn->prepare($query);
    //     $stmt->bindValue(1, $animal_id, PDO::PARAM_INT);
    //     $stmt->bindValue(2, $imagePath, PDO::PARAM_STR);
    //     $stmt->execute();
    // }
}
