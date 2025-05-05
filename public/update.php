<?php
session_start();
require '../config/db.php';
require '../process/validate.php';
if ($tipo !== 'admin') {
  header('Location: ../public/dashboard.php?erro=AcessoRestrito');
  exit;}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT id, nome, email, telefone, tipo, status FROM usuarios WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $user = $stmt->fetch();

    if (!$user) {
        header("Location: dashboard.php?msg=Usuário não encontrado.");
        exit;
    }
} else {
    header("Location: dashboard.php?msg=ID não fornecido.");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/navbar.css">
</head>
<body>
    <header>
        <?php include "../assets/navbar.php";?>
    </header>
    <h1 style="text-align: center;">UPDATE</h1>
<div class="container">
<form action="../process/processUpdate.php" method="POST">
<input type="hidden" name="id" value="<?= $user['id'] ?>">

    <div>
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?= $user['nome'] ?>" required>
    </div>

    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?= $user['email'] ?>" required>
    </div>

    <div>
        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone" value="<?= $user['telefone'] ?>" required>
    </div>

    <div>
        <label for="tipo">Tipo:</label>
        <select id="tipo" name="tipo">
            <option value="usuario" <?= $user['tipo'] === 'usuario' ? 'selected' : '' ?>>Usuário</option>
            <option value="colaborador" <?= $user['tipo'] === 'colaborador' ? 'selected' : '' ?>>Colaborador</option>
            <option value="admin" <?= $user['tipo'] === 'admin' ? 'selected' : '' ?>>Admin</option>
        </select>
    </div>

    <div>
        <label for="status">Status:</label>
        <select id="status" name="status">
            <option value="ativo" <?= $user['status'] === 'ativo' ? 'selected' : '' ?>>Ativo</option>
            <option value="inativo" <?= $user['status'] === 'inativo' ? 'selected' : '' ?>>Inativo</option>
        </select>
    </div>

    <button type="submit">Atualizar</button>
</form>
</div>
</body>
</html>