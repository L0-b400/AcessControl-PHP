<?php
session_start();
require_once __DIR__ . '/../config/db.php';

// 🔐 Impede acesso de usuários não logados
if (!isset($_SESSION['usuario_id']) || $_SESSION['usuario_tipo'] !== 'admin') {
    http_response_code(403); // Código HTTP 403 = "Forbidden"
    echo "Acesso negado. Você não tem permissão para cadastrar usuários.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome     = trim($_POST['nome']  ?? '');
    $email    = trim($_POST['email'] ?? '');
    $senhaRaw = $_POST['senha']      ?? '';
    $tipo     = $_POST['tipo']       ?? 'usuario';
    $status   = $_POST['status']     ?? 'ativo';

    // Validação básica
    if ($nome === '' || $email === '' || $senhaRaw === '') {
        echo "Preencha todos os campos obrigatórios.";
        exit;
    }

    // Permite apenas tipos e status válidos
    $tiposPermitidos = ['usuario', 'colaborador', 'admin'];
    $statusPermitidos = ['ativo', 'inativo'];

    if (!in_array($tipo, $tiposPermitidos)) $tipo = 'usuario';
    if (!in_array($status, $statusPermitidos)) $status = 'ativo';

    // Verifica se email já existe
    $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email");
    $stmt->execute(['email' => $email]);
    if ($stmt->fetch()) {
        echo "Este e‑mail já está cadastrado.";
        exit;
    }

    // Cadastra usuário
    $hash = password_hash($senhaRaw, PASSWORD_DEFAULT);
    $sql = "INSERT INTO usuarios (nome, email, senha, tipo, status)
            VALUES (:nome, :email, :senha, :tipo, :status)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'nome'   => $nome,
        'email'  => $email,
        'senha'  => $hash,
        'tipo'   => $tipo,
        'status' => $status
    ]);

    echo "Usuário cadastrado com sucesso.";
}
?>
