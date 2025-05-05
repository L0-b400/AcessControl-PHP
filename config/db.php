<?php
declare(strict_types=1);
require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

    function getDbConfig(string $env): array {
        if (strtolower($env) === 'prod') {
            return [
                'host' => $_ENV['DB_HOST_PROD'] ?? 'localhost',
                'user' => $_ENV['DB_USER_PROD'] ?? 'root',
                'pass' => $_ENV['DB_PASS_PROD'] ?? '',
                'db'   => $_ENV['DB_NAME_PROD'] ?? 'meubanco',
            ];
        }
        return [
            'host' => $_ENV['DB_HOST'] ?? 'localhost',
            'user' => $_ENV['DB_USER'] ?? 'root',
            'pass' => $_ENV['DB_PASS'] ?? '',
            'db'   => $_ENV['DB_NAME'] ?? 'meubanco',
        ];
    }
$appEnv = $_ENV['APP_ENV'] ?? 'dev';
$dbConfig = getDbConfig($appEnv);

$dsn = "mysql:host={$dbConfig['host']};dbname={$dbConfig['db']};charset=utf8mb4";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $dbConfig['user'], $dbConfig['pass'], $options);
} catch (PDOException $e) {
    error_log("Erro na conexão com o banco: " . $e->getMessage());
    die("Erro ao conectar ao banco de dados.");
}