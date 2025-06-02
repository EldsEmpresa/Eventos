<?php
session_start();
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = trim($_POST['login']);
    $senha = $_POST['senha'];

    $sql = "SELECT usuarios, senha FROM users WHERE usuarios = ?";
    $stmt = $con->prepare($sql);
    $stmt->execute([$usuario]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        if (password_verify($senha, $user['senha'])) {
            echo "Login OK para usuário: {$user['usuarios']}";
            exit;
        } else {
            echo "Senha incorreta!";
            exit;
        }
    } else {
        echo "Usuário não encontrado!";
        exit;
    }
}
?>

<form method="POST">
    <input type="text" name="login" placeholder="Usuário" required><br>
    <input type="password" name="senha" placeholder="Senha" required><br>
    <button type="submit">Entrar</button>
</form>