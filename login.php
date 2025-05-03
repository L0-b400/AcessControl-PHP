<?php
session_start();
require_once __DIR__ . '/config/db.php';

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
        header('Location: dashboard.php');
        exit;
    } else {
        echo "Email ou senha inválidos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form action="login.php" method="post">
        <label for="email">E-mail:</label>
        <input type="email" name="email" required><br><br>
        
        <label for="senha">Senha:</label>
        <input type="password" name="senha" required><br><br>
        
        <button type="submit">Entrar</button>
    </form>
</body>
</html>
