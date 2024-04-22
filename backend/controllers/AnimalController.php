<?php
require_once ('./models/Animal.php');
require_once ('./controllers/ImageController.php'); // Importe o controller de imagens
require_once ('./models/Image.php'); // Importe o controller de imagens


class AnimalController
{
    private $animalModel;
    private $imageModel;
    private $db;
    private $s3;

    public function __construct($db, $s3)
    {
        $this->animalModel = new Animal($db);
        $this->imageModel = new Image($db);
        $this->db = $db;
        $this->s3 = $s3;
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

    public function getAllWithImages()
    {
        $animais = $this->animalModel->getAll();
        $imageController = new ImageController($this->db, $this->s3);

        if ($animais) {
            // Itera sobre os animais para adicionar os URLs das imagens
            foreach ($animais as &$animal) {
                $animal['images'] = $imageController->getImagesUrlsForAnimal($animal['id_animal']);
            }
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

        $userId = $data['userId'];
        $name = $data['name'];
        $age = $data['age'];
        $gender = $data['gender'];
        $description = $data['description'];
        $size = $data['size'];
        $weight = $data['weight'];
        $temperament = $data['temperament'];
        $publication_date = $data['publication_date'];
        $status_id = $data['status_id'];
        $owner_id = $data['owner_id'];
        $species_id = $data['species_id'];

        $imageController = new ImageController($this->db, $this->s3);

        // Chamar a função de upload de imagens
        if (isset($_FILES['images']) && is_array($_FILES['images'])) {

            $uploadResults = $imageController->uploadImages($_FILES['images'], $userId);
        } else {
            // Trate este caso de acordo com a lógica do seu aplicativo
            return "Erro: _FILES['images'] não está definido ou não é um array";
        }

        $imageUrls = [];
        foreach ($uploadResults as $result) {

            if (isset($result['ObjectURL'])) {
                $imageUrls[] = $result['ObjectURL'];
            } else {
                // Lidar com falha no upload da imagem, se necessário
            }
        }

        $result = $this->animalModel->create(
            $name,
            $age,
            $gender,
            $description,
            $size,
            $weight,
            $temperament,
            $publication_date,
            $status_id,
            $owner_id,
            $species_id,
            $imageUrls
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
