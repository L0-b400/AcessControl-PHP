<?php
session_start();
require '../config/db.php';
if (!isset($_SESSION['usuario_tipo']) || $_SESSION['usuario_tipo'] !== 'admin') {
    header('Location: ../public/dashboard.php?erro=AcessoRestrito');
    exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT id, status FROM usuarios WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $user = $stmt->fetch();

    if (!$user) {
        header("Location: ../public/dashboard.php??msg=Usuário não encontrado.");
        exit;
    }
    if ($user['status'] === 'inativo') {
        header("Location: ../public/dashboard.php?msg=Usuário já está inativo.");
        exit;
    }

    $sql = "UPDATE usuarios SET status = 'inativo' WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);

    header("Location: ../public/dashboard.php?msg=Usuário desativado com sucesso!");
    exit;

} else {
    header("Location: ../public/dashboard.php?msg=ID não fornecido.");
    exit;
}
?>
