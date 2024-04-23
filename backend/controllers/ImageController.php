<?php
require_once ('./models/Image.php');

class ImageController
{
    private $imageModel;
    private $s3;

    public function __construct($db, $s3)
    {
        $this->imageModel = new Image($db);
        $this->s3 = $s3;
    }

    public function getImagesForAnimal($userId, $animalId)
    {
        $bucketName = 'projetointegrador';
        $images = [];
    
        try {
            // Listar objetos no bucket do MinIO
            $objects = $this->s3->listObjects([
                'Bucket' => $bucketName,
                'Prefix' => "users/{$userId}/animals/{$animalId}/",
            ]);
    
            // Construir URLs para as imagens
            foreach ($objects['Contents'] as $object) {
                $imagePath = "https://localhost::2020/{$bucketName}/{$object['Key']}";
                $images[] = $imagePath;
            }
    
            return $images;
        } catch (Exception $e) {
            // Lidar com erros, como falha na conexão com o MinIO
            return [];
        }
    }

    public function uploadImages($request, $userId, $animalId)
    {
        // Verifica se foram enviadas imagens
        if (!empty($request)) {
            $images = $request;
            $uploadResults = [];

            foreach ($images['tmp_name'] as $key => $tempFilePath) {
                // Verifica se não houve erros durante o upload
                if ($images['error'][$key] === 0) {
                    $imageName = $images['name'][$key];
                    $bucketName = 'projetointegrador';
                    $userImagePath = "users/{$userId}/animals/{$animalId}/{$imageName}";

                    try {
                        $result = $this->s3->putObject([
                            'Bucket' => $bucketName,
                            'Key' => $userImagePath,
                            'SourceFile' => $tempFilePath,
                        ]);

                        // Adiciona o resultado do upload ao array de resultados
                        $uploadResults[] = $result;

                    } catch (Exception $e) {
                        // Se ocorrer um erro durante o upload, adiciona uma mensagem de erro ao array de resultados
                        $uploadResults[] = ['success' => false, 'message' => 'Erro ao enviar a imagem: ' . $e->getMessage()];
                    }
                } else {
                    // Se ocorrer um erro durante o upload, adiciona uma mensagem de erro ao array de resultados
                    $uploadResults[] = ['success' => false, 'message' => 'Erro durante o upload da imagem.'];
                }
            }

            // Retorna o array de resultados dos uploads
            return $uploadResults;
        } else {
            return ['success' => false, 'message' => 'Nenhuma imagem enviada.'];
        }
    }

}

