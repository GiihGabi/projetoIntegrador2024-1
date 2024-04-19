 <?php
//require_once ('config/config.php');
//require_once ('./vendor/autoload.php');
//require_once 'Router.php';
//require_once ('./config/minio/s3.php');
//
//// Inclua os controladores
//require_once ('./controllers/AuthController.php');
//require_once ('./controllers/UserController.php');
//require_once ('./controllers/AnimalController.php');
//require_once ('./controllers/ImageController.php');
//
////CORS
//header("Access-Control-Allow-Origin: *");
//header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
//header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
//header("Access-Control-Allow-Credentials: true");
//
//$db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
// $router = new Router(); 
// 


//Rotas

// //registro
// $router->post('/api/register', function () {
//     global $db;

//     $data = json_decode(file_get_contents('php://input'), true);
//     if (!isset ($data['username']) || !isset ($data['password']) || !isset ($data['email'])) {
//         return 'Erro: Dados incompletos';
//     }

//     $controller = new UserController($db);
//     return $controller->register($data);
// });


// //login
// $router->post('/api/login', function () {
//     global $db;

//     $data = json_decode(file_get_contents('php://input'), true);
//     if (!isset ($data['email']) || !isset ($data['password'])) {
//         return 'Erro: Dados incompletos';
//     }

//     $controller = new AuthController($db);
//     return $controller->login($data['email'], $data['password']);
// });


// //GetAllAnimals
// $router->get('/api/animals', function () {
//     global $db;
//     global $s3;

//     $controller = new AnimalController($db, $s3);
//     return $controller->getAll();
// });


// //GetAnimalsById
// $router->get('/api/animals/{id}', function ($id) {
//     global $db;
//     global $s3;

//     $controller = new AnimalController($db, $s3);
//     return $controller->getById($id);
// });


// //CreateAnimal
// $router->post('/api/animals', function () {
//     global $db;
//     global $s3;

//     $requiredFields = ['name', 'age', 'gender', 'description', 'size', 'weight', 'temperament', 'publication_date', 'status_id', 'owner_id', 'species_id'];
//     foreach ($requiredFields as $field) {

//         if (!isset ($_POST[$field])) {
//             return 'Erro: Campo ' . $field . ' não foi enviado';
//         }
//     }

//     $data = [
//         'name' => $_POST['name'],
//         'age' => $_POST['age'],
//         'gender' => $_POST['gender'],
//         'description' => $_POST['description'],
//         'size' => $_POST['size'],
//         'weight' => $_POST['weight'],
//         'temperament' => $_POST['temperament'],
//         'publication_date' => $_POST['publication_date'],
//         'status_id' => $_POST['status_id'],
//         'owner_id' => $_POST['owner_id'],
//         'species_id' => $_POST['species_id'],
//         'images' => $_FILES['images']
//     ];


//     $controller = new AnimalController($db, $s3);
//     return $controller->create($data);
// });

// //GetAnimalsByOwner
// $router->get('/api/animals/owner/{ownerId}', function ($ownerId) {
//     global $db;
//     global $s3;
//     $controller = new AnimalController($db, $s3);
//     return $controller->getByOwnerId($ownerId);
// });


// //uploadImageToBucket
// $router->post('/api/uploadImages/{userID}', function ($userID) {
//     global $db, $s3;
//     $controller = new ImageController($db, $s3);
//     var_dump($_FILES);
//     return $controller->uploadImages($_FILES, $userID);
// });


// $router->get('/api/teste', function () {
//     return 'Rota de teste GET';
// });
// $router->post('/api/teste', function () {
//     return 'Rota de teste POST';
// });


// $router->run(); -->
