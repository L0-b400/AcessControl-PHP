<?php
if (!isset($_SESSION['usuario_id'])) {
    header('Location: /p01/login.php');
    exit;
}
$nome = htmlspecialchars($_SESSION['usuario_nome']);
$tipo = htmlspecialchars($_SESSION['usuario_tipo']);
?>