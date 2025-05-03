<?php
require '../process/processRegister.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Cadastro de Usuário (Admin)</title>

  <style>
    body { font-family: sans-serif; background:#f5f5f5; }
    .container { 
      width: 400px; margin: 50px auto; padding:20px;
      background:#fff; border-radius:8px; box-shadow:0 0 10px rgba(0,0,0,0.1);
    }
    input, select, button { width:100%; padding:10px; margin:8px 0; }
    button { cursor:pointer; }
    .msg { color:red; margin:10px 0; }
  </style>
  
</head>
<body>
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
