<?php
session_start();
require_once __DIR__ . '/../config/db.php';
require '/validate.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    if (empty($email) || empty($senha)) {
        echo "Preencha todos os campos.";
        exit;
    }

    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email AND status = 'ativo'");
    $stmt->execute(['email' => $email]);
    $usuario = $stmt->fetch();

    if ($usuario && password_verify($senha, $usuario['senha'])) {
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['usuario_nome'] = $usuario['nome'];
        $_SESSION['usuario_tipo'] = $usuario['tipo'];
        header('Location: ../public/dashboard.php');
        exit;
    } else {
        echo "Email ou senha inválidos.";
    }
}
?>
