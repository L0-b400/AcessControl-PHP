<?php
session_start();
require '../process/validate.php';
require '../config/db.php';

$sql = "SELECT id, nome, email, telefone, tipo, status, criado_em, atualizado_em FROM usuarios";
try {
  $stmt = $pdo->query($sql);
  $usuarios = $stmt->fetchAll();
} catch (PDOException $e) {
    die("Erro ao buscar usuarios" . $e->getMessage());
}
$msg = isset($_GET['msg']) ? $_GET['msg'] : '';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../assets/css/navbar.css">
  <title>Dashboard</title>
  <script>
    
    // Função para exibir o pop-up
    window.onload = function() {
        <?php if ($msg): ?>
            alert('<?= htmlspecialchars($msg) ?>');
        <?php endif; ?>
    }
    
  </script>
</head>
<body>
  <?php include '../assets/navbar.php' ?>
  <div class="container">
    <h1>Dashboard</h1>
    <p>Bem-vindo ao painel do sistema, <strong><?= $_SESSION['usuario_nome'] ?? 'Usuário' ?></strong>!</p>

    <h2>Lista de Usuários</h2>
    <table border="1" cellpadding="8" cellspacing="0">
      <thead>
        <tr>
          <th>Nome</th>
          <th>Email</th>
          <th>Telefone</th>
          <th>Tipo</th>
          <th>Status</th>
          <th>Criado Em</th>
          <th>Atualizado Em</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($usuarios as $user): ?>
  <tr>
    <td><?= $user['nome'] ?></td>
    <td><?= $user['email'] ?></td>
    <td><?= $user['telefone'] ?></td>
    <td><?= $user['tipo'] ?></td>
    <td><?= $user['status'] ?></td>
    <td><?= $user['criado_em'] ?></td>
    <td><?= $user['atualizado_em'] ?></td>
    <td>
      <a href="update.php?id=<?= $user['id'] ?>"><button>Editar</button></a>
      <a href="../process/processInactivate.php?id=<?= $user['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir este usuário?')">
        <button>Inativar</button>
      </a>
    </td>
  </tr>
<?php endforeach; ?>


      
      </tbody>
    </table>
  </div>
</body>
</html>
