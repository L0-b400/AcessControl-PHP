<?php
    session_start();
    require_once 'config/db.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/style.css">

    <title>Login</title>
</head>
<body>
    <div class="container">
    <h2>Login</h2>
        <form class="formulario" action="process/processLogin.php" method="post">
            <label for="email">E-mail:</label>
            <input type="email" name="email" required><br><br>
            
            <label for="senha">Senha:</label>
            <input type="password" name="senha" required><br><br>
            
            <button type="submit">Entrar</button>
        </form>
    </div>
</body>
</html>
