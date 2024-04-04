<?php
$host = 'localhost';
$port = 8000;

$command = "php -S $host:$port";

echo "Iniciando servidor em http://$host:$port..." . PHP_EOL;

system($command);
