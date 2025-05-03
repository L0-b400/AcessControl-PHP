<?php
// Carregar o autoload do Composer e o .env
require_once __DIR__ . '/vendor/autoload.php';

// Carregar o arquivo .env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Obter as variáveis de ambiente
$appEnv = $_ENV['APP_ENV'];

// Se for ambiente de desenvolvimento
if ($appEnv === 'dev') {
    $host = $_ENV['DB_HOST'];
    $user = $_ENV['DB_USER'];
    $pass = $_ENV['DB_PASS'];
    $db = $_ENV['DB_NAME'];
}
// Se for ambiente de produção
else {
    $host = $_ENV['DB_HOST_PROD'];
    $user = $_ENV['DB_USER_PROD'];
    $pass = $_ENV['DB_PASS_PROD'];
    $db = $_ENV['DB_NAME_PROD'];
}

// Conectar ao banco de dados
$mysqli = new mysqli($host, $user, $pass, $db);

// Verificar se houve erro na conexão
if ($mysqli->connect_error) {
    die("Failed to connect to Database: " . $mysqli->connect_error);
}

// Definir o charset para UTF-8
$mysqli->set_charset("utf8");
?>
