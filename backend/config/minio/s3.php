<?php
// S3 account credentials
require_once __DIR__ . '/../../vendor/autoload.php';

use Aws\S3\S3Client;

// Configurações do MinIO local
$minioConfig = [
    'version' => 'latest',
    'region' => 'us-east-1',
    'endpoint' => 'http://localhost:2020',
    'use_path_style_endpoint' => true,
    'credentials' => [
        'key' => 'BKGgbeEV9SbP5ghvsXZa',
        'secret' => 'K3fADOsKiPGwVCsdDsZtlCFUlFDDO5QhGkizdGDO',
    ],
];

// Crie um cliente S3
$s3 = new S3Client($minioConfig);

// Nome do seu bucket
$bucketName = 'teste';























