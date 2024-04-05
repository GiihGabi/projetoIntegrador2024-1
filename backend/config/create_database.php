<?php

require_once 'config.php';

$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$sql_create_db = "CREATE DATABASE IF NOT EXISTS " . DB_NAME;
if ($conn->query($sql_create_db) === TRUE) {
    echo "Banco de dados criado com sucesso ou já existente\n";
} else {
    echo "Erro ao criar banco de dados: " . $conn->error . "\n";
}

$conn->select_db(DB_NAME);

$sql_create_table = "
    CREATE TABLE IF NOT EXISTS sua_tabela (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(30) NOT NULL,
        email VARCHAR(50),
        password VARCHAR(255),
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )
";

if ($conn->query($sql_create_table) === TRUE) {
    echo "Tabela criada com sucesso ou já existente\n";
} else {
    echo "Erro ao criar tabela: " . $conn->error . "\n";
}

$conn->close();
