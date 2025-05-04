<?php
require '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id'], $_POST['nome'], $_POST['email'], $_POST['telefone'], $_POST['tipo'], $_POST['status'])) {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $tipo = $_POST['tipo'];
        $status = $_POST['status'];

        // Atualizando os dados no banco de dados
        $sql = "UPDATE usuarios SET nome = :nome, email = :email, telefone = :telefone, tipo = :tipo, status = :status WHERE id = :id";
        $stmt = $pdo->prepare($sql);

        // Executa a atualização
        $stmt->execute([
            ':id' => $id,
            ':nome' => $nome,
            ':email' => $email,
            ':telefone' => $telefone,
            ':tipo' => $tipo,
            ':status' => $status
        ]);

        // Redireciona com uma mensagem de sucesso
        header("Location: ../public/dashboard.php?msg=Usuário atualizado com sucesso.");
        exit;
    }
} else {
    // Se não for um método POST, redireciona
    header("Location: ../public/dashboard.php?msg=Dados inválidos.");
    exit;
}
?>
