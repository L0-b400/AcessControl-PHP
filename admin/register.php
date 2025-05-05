<?php
session_start();
require '../process/processRegister.php';
require '../process/validate.php';
if ($tipo !== 'admin') {
  header('Location: ../public/dashboard.php?erro=AcessoRestrito');
  exit;}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/navbar.css">
  <title>Cadastro de Usuário (Admin)</title>  
</head>
<body>
  <?php include "../assets/navbar.php"; ?> 
  <div class="container">
    <h2>Cadastro de Usuário (Admin)</h2>
    <?php if ($mensagem): ?>
      <p class="msg"><?= htmlspecialchars($mensagem) ?></p>
    <?php endif; ?>
    <form action="register.php" method="post">
      <input type="text" name="nome"  placeholder="Nome completo" required>
      <input type="email" name="email" placeholder="E‑mail" required>
      <input type="password" name="senha" placeholder="Senha" required>
      <select name="tipo">
        <option value="usuario">Usuário</option>
        <option value="colaborador">Colaborador</option>
        <option value="admin">Admin</option>
      </select>
      <select name="status">
        <option value="ativo">Ativo</option>
        <option value="inativo">Inativo</option>
      </select>
      <button type="submit">Cadastrar</button>
    </form>
    <p><a href="../dashboard.php">Voltar ao Dashboard</a></p>
  </div>
</body>
</html>
