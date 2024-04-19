<?php
require_once('./config/config.php');

class Image
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function saveImagePath($imagePath)
    {
        try {
            // Prepare a declaração SQL para inserir o caminho da imagem no banco de dados
            $query = "INSERT INTO images (image_path) VALUES (:image_path)";
            $stmt = $this->conn->prepare($query);

            // Bind dos parâmetros e execução da consulta
            $stmt->bindParam(':image_path', $imagePath);
            if ($stmt->execute()) {
                return true; // Retornar true se a inserção for bem-sucedida
            } else {
                return false; // Retornar false se houver algum erro na inserção
            }
        } catch (PDOException $e) {
            // Lidar com erros de banco de dados, se necessário
            return false;
        }
    }
}
