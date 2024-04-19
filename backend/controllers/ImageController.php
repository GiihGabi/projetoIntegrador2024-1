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

    public function uploadImages($request, $userID)
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
                    $userImagePath = "users/{$userID}/{$imageName}";

                    try {
                        $result = $this->s3->putObject([
                            'Bucket' => $bucketName,
                            'Key' => $userImagePath,
                            'SourceFile' => $tempFilePath,
                        ]);

                        // Adiciona o resultado do upload ao array de resultados
                        $uploadResults[] = $result;
                        // var_dump($result['ObjectURL']);

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

