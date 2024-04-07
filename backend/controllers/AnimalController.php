<?php
require_once ('./models/Animal.php');

class AnimalController
{
    private $animalModel;

    public function __construct($db)
    {
        $this->animalModel = new Animal($db);
    }

    public function getAll()
    {
        $animais = $this->animalModel->getAll();
        if ($animais) {
            return json_encode($animais);
        } else {
            return $this->errorResponse("Nenhum animal encontrado", 404);
        }
    }

    public function getById($id)
    {
        $animal = $this->animalModel->findById($id);
        if ($animal) {
            return json_encode($animal);
        } else {
            return $this->errorResponse("Animal não encontrado", 404);
        }
    }

    public function getByOwnerId($ownerId)
    {    
        $animais = $this->animalModel->findByField('owner_id', $ownerId);
    
        if ($animais) {
            error_log("Animais encontrados: " . json_encode($animais));
            return json_encode($animais);
        } else {
            return "Nenhum animal encontrado para este proprietário" + $ownerId;
        }
    }

    public function create($data)
    {
        $result = $this->animalModel->create(
            $data['name'],
            $data['age'],
            $data['sex'],
            $data['description'],
            $data['size'],
            $data['weight'],
            $data['temperament'],
            $data['photo1'],
            $data['photo2'],
            $data['photo3'],
            $data['publication_date'],
            $data['status_id'],
            $data['owner_id'],
            $data['species_id']
        );

        if ($result === true) {
            return $this->successResponse("Animal criado com sucesso", 201);
        } else {
            return $this->errorResponse("Erro ao criar animal", 500, "Detalhes adicionais sobre o erro");
        }
    }

    // Função para criar uma resposta de sucesso
    private function successResponse($message, $statusCode)
    {
        http_response_code($statusCode);
        return json_encode(array("success" => true, "message" => $message));
    }

    // Função para criar uma resposta de erro
    // Função para criar uma resposta de erro com detalhes
    private function errorResponse($message, $statusCode, $details = null)
    {
        http_response_code($statusCode);
        $response = array("success" => false, "error" => $message);
        if ($details !== null) {
            $response["details"] = $details;
        }
        return json_encode($response);
    }
}
