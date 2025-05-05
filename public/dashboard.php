<?php
session_start();
require '../process/validate.php';
require '../config/db.php';

$msg = isset($_GET['msg']) ? $_GET['msg'] : '';
$alertas = [
    'sucesso' => 'Operação realizada com sucesso.',
    'erro' => 'Erro na operação.'
];
$mensagem = $alertas[$msg] ?? '';

try {
    $stmt = $pdo->prepare("SELECT id, nome, email, telefone, tipo, status, criado_em, atualizado_em FROM usuarios");
    $stmt->execute();
    $usuarios = $stmt->fetchAll();
} catch (PDOException $e) {
    error_log($e->getMessage());
    die("Erro ao buscar usuários.");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../assets/css/style.css">
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
  
<header>
<?php include '../assets/navbar.php' ?> 
</header>
  <div class="container">
    <h1>Dashboard</h1>
    <p class="par">Bem-vindo ao painel do sistema, <span class="user"><?= $_SESSION['usuario_nome'] ?? 'Usuário' ?>!</span></p>

    <h2>Lista de Usuários</h2>
    <table class="table">
      <thead table-header>
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
              <a href="update.php?id=<?= $user['id'] ?>">
                <button>Editar</button>
              </a>
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
