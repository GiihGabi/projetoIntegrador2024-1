<?php
require_once ('./config/config.php');

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

    public function getImagesUrlsForAnimal($animalId)
    {
        try {
            // Prepare a declaração SQL para obter os URLs das imagens associadas ao animal
            $query = "SELECT image_path FROM animal_images WHERE animal_id = :animal_id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':animal_id', $animalId);
            
            // Execute a consulta
            if ($stmt->execute()) {
                $imageUrls = [];
                // Itera sobre os resultados para extrair os URLs das imagens
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $imageUrls[] = $row['image_path'];
                }
                return $imageUrls;
            } else {
                // Retornar null ou lançar uma exceção em caso de falha na execução da consulta
                return null;
            }
        } catch (PDOException $e) {
            // Lidar com erros de banco de dados, se necessário
            return null;
        }
    }
}
