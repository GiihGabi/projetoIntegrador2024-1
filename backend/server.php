<?php
// Define o endereço e a porta onde o servidor irá escutar
$host = 'localhost';
$port = 8000;

// Define o comando para iniciar o servidor embutido
$command = "php -S $host:$port -t public";

// Exibe uma mensagem informando que o servidor está sendo iniciado
echo "Iniciando servidor em http://$host:$port..." . PHP_EOL;

// Executa o comando para iniciar o servidor embutido
system($command);
