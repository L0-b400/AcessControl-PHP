<?php
session_start();
// Verifica se está logado
if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit;
}
$nome = htmlspecialchars($_SESSION['usuario_nome']);
$tipo = htmlspecialchars($_SESSION['usuario_tipo']);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="assets/css/navbar.css">
  <title>Dashboard</title>
</head>
<body>
  <nav class="navbar">
    <div class="nav-left">
      <a href="index.php">Início</a>
      <a href="dashboard.php">Dashboard</a>
      <!-- adicione outros links aqui -->
    </div>
    <div class="nav-right user-info">
      Olá, <?= $nome ?> (<?= $tipo ?>)
      <a href="logout.php" style="color:#f66;">Sair</a>
    </div>
  </nav>

  <div class="container">
    <h1>Dashboard</h1>
    <p>Bem-vindo ao painel do sistema, <strong><?= $nome ?></strong>!</p>
    <!-- aqui você pode colocar gráficos, cards, tabelas, etc. -->
  </div>
</body>
</html>
