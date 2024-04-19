<?php

require_once 'config.php';

// Conexão com o banco de dados
$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD);

// Verifica conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Verifica se o banco de dados existe
$result = $conn->query("SHOW DATABASES LIKE '" . DB_NAME . "'");
if ($result->num_rows == 0) {
    // O banco de dados não existe, então criamos ele
    $create_database_query = "CREATE DATABASE " . DB_NAME;
    if ($conn->query($create_database_query) === TRUE) {
        echo "Banco de dados " . DB_NAME . " criado com sucesso\n";
    } else {
        echo "Erro ao criar banco de dados: " . $conn->error . "\n";
        exit;
    }
} else {
    echo "O banco de dados " . DB_NAME . " já existe\n";
}

// Agora podemos nos conectar ao banco de dados especificado em config.php
$conn->close();
$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Verifica conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Query para criar a tabela de usuários
$sql_create_users_table = "
    CREATE TABLE IF NOT EXISTS users (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL,
        password VARCHAR(255) NOT NULL,
        zip_code VARCHAR(20) NOT NULL,
        registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        user_level ENUM('Admin', 'Petshop', 'Client') NOT NULL,
        document VARCHAR(20) NOT NULL, -- CNPJ for Petshop, CPF for Client
        profile_image VARCHAR(255)
    )
";

if ($conn->query($sql_create_users_table) === TRUE) {
    echo "Users table created successfully or already exists\n";
} else {
    echo "Error creating users table: " . $conn->error . "\n";
}


// Query para criar a tabela de espécies de animais
$sql_create_species_table = "
    CREATE TABLE IF NOT EXISTS species (
        id_species INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        species_name VARCHAR(100) NOT NULL
    )
";

if ($conn->query($sql_create_species_table) === TRUE) {
    echo "Species table created successfully or already exists\n";
} else {
    echo "Error creating species table: " . $conn->error . "\n";
}

// Query para criar a tabela de status de animais
$sql_create_status_table = "
    CREATE TABLE IF NOT EXISTS status (
        id_status INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        description VARCHAR(100) NOT NULL
    )
";

if ($conn->query($sql_create_status_table) === TRUE) {
    echo "Status table created successfully or already exists\n";
} else {
    echo "Error creating status table: " . $conn->error . "\n";
}


// Query para criar a tabela de animais
$sql_create_animals_table = "
    CREATE TABLE IF NOT EXISTS animals (
        id_animal INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        animal_name VARCHAR(100) NOT NULL,
        age INT(3),
        gender ENUM('M', 'F'),
        description TEXT,
        size VARCHAR(20),
        weight FLOAT,
        temperament TEXT,
        publication_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        status_id INT(6) UNSIGNED,
        owner_id INT(6) UNSIGNED,
        species_id INT(6) UNSIGNED,
        FOREIGN KEY (status_id) REFERENCES status(id_status),
        FOREIGN KEY (owner_id) REFERENCES users(id),
        FOREIGN KEY (species_id) REFERENCES species(id_species)
    )
";

if ($conn->query($sql_create_animals_table) === TRUE) {
    echo "Animals table created successfully or already exists\n";
} else {
    echo "Error creating animals table: " . $conn->error . "\n";
}
$sql_create_animal_images_table = "
    CREATE TABLE IF NOT EXISTS animal_images (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        animal_id INT(6) UNSIGNED,
        image_path VARCHAR(255) NOT NULL,
        FOREIGN KEY (animal_id) REFERENCES animals(id_animal)
    )
";

if ($conn->query($sql_create_animal_images_table) === TRUE) {
    echo "Animal images table created successfully or already exists\n";
} else {
    echo "Error creating animal images table: " . $conn->error . "\n";
}


$conn->close();
