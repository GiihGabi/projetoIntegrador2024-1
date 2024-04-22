<?php
require_once ('config/config.php');
require_once ('./vendor/autoload.php');
require_once 'Router.php';
require_once ('./config/minio/s3.php');
require_once ('./controllers/AnimalController.php');

global $router;
global $db;
global $s3;

// GetAllAnimals
$router->get('/api/animals', function () use ($db, $s3) {
    $controller = new AnimalController($db, $s3);
    return $controller->getAll();
});

//GetAllAnimalsWithImages
$router->get('/api/animalsImages', function () use ($db, $s3) {
    $controller = new AnimalController($db, $s3);
    return $controller->getAllWithImages();
 });

// GetAnimalsById
$router->get('/api/animals/{id}', function ($id) use ($db, $s3) {
    $controller = new AnimalController($db, $s3);
    return $controller->getById($id);
});

// GetAnimalsByOwner
$router->get('/api/animals/owner/{ownerId}', function ($ownerId) use ($db, $s3) {
    $controller = new AnimalController($db, $s3);
    return $controller->getByOwnerId($ownerId);
});


// CreateAnimal
$router->post('/api/animals', function () use ($db, $s3) {
    $requiredFields = ['userId', 'name', 'age', 'gender', 'description', 'size', 'weight', 'temperament', 'status_id', 'owner_id', 'species_id'];
    foreach ($requiredFields as $field) {

        if (!isset ($_POST[$field])) {
            return ('Erro: Campo ' . $field . ' não foi enviado');

        }
    }

    $data = [
        'userId' => $_POST['userId'],
        'name' => $_POST['name'],
        'age' => $_POST['age'],
        'gender' => $_POST['gender'],
        'description' => $_POST['description'],
        'size' => $_POST['size'],
        'weight' => $_POST['weight'],
        'temperament' => $_POST['temperament'],
        // 'publication_date' => $_POST['publication_date'],
        'status_id' => $_POST['status_id'],
        'owner_id' => $_POST['owner_id'],
        'species_id' => $_POST['species_id'],
        'images' => $_FILES['images']
    ];
    $controller = new AnimalController($db, $s3);
    return $controller->create($data);
});
