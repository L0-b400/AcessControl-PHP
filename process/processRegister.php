<?php
session_start();
require_once __DIR__ . '/../config/db.php';

$mensagem = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome     = trim($_POST['nome']  ?? '');
    $email    = trim($_POST['email'] ?? '');
    $senhaRaw = $_POST['senha']       ?? '';
    $tipo     = $_POST['tipo']       ?? 'usuario';
    $status   = $_POST['status']     ?? 'ativo';

    if ($nome === '' || $email === '' || $senhaRaw === '') {
        $mensagem = 'Preencha todos os campos obrigatórios.';
    } else {
        $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email");
        $stmt->execute(['email' => $email]);
        if ($stmt->fetch()) {
            $mensagem = 'Este e‑mail já está cadastrado.';
        } else {
            $hash = password_hash($senhaRaw, PASSWORD_DEFAULT);
            $sql = <<<SQL
                INSERT INTO usuarios
                    (nome, email, senha, tipo, status)
                VALUES
                    (:nome, :email, :senha, :tipo, :status)
            SQL;
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'nome'   => $nome,
                'email'  => $email,
                'senha'  => $hash,
                'tipo'   => $tipo,
                'status' => $status
            ]);

            $mensagem = 'Usuário cadastrado com sucesso!';
        }
    }
}
?>