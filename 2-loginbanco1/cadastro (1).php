<?php
include 'conexao.php';

$mensagem = '';
$classe = 'mensagem';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = trim($_POST['login']);
    $senha = trim($_POST['senha']);

    if (empty($usuario) || empty($senha)) {
        $mensagem = "Preencha todos os campos.";
        $classe = 'mensagem erro';
    } else {
        $sql = "SELECT COUNT(*) FROM users WHERE usuarios = ?";
        $stmt = $con->prepare($sql);
        $stmt->execute([$usuario]);
        if ($stmt->fetchColumn() > 0) {
            $mensagem = "Usuário já existe. Escolha outro login.";
            $classe = 'mensagem erro';
        } else {
            $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (usuarios, senha) VALUES (?, ?)";
            $stmt = $con->prepare($sql);
            if ($stmt->execute([$usuario, $senha_hash])) {
                $mensagem = "Cadastro realizado com sucesso! Você será redirecionado para o login...";
                // redirecionar depois
                $redirect = "login.php";
            } else {
                $mensagem = "Erro ao cadastrar usuário.";
                $classe = 'mensagem erro';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Cadastro</title>
<link rel="stylesheet" href="css/mensagem.css">
<?php if (!empty($redirect)): ?>
<script>
  setTimeout(() => {
    window.location.href = "<?php echo $redirect; ?>";
  }, 3000);
</script>
<?php endif; ?>
</head>
<body>
    <div class="container">
        <h2>Cadastro</h2>

        <?php if ($mensagem): ?>
            <div class="<?php echo $classe; ?>">
                <?php echo $mensagem; ?>
            </div>
        <?php endif; ?>

        <?php if (empty($redirect)): ?>
            <form method="POST" action="">
            <input type="text" name="login" placeholder="Usuário" required><br><br>
            <input type="password" name="senha" placeholder="Senha" required><br><br>
            <button type="submit">Cadastrar</button>
        </form>
    <?php endif; ?>
    </div>
</body>
