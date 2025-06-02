<?php
session_start();
include 'conexao.php';

$erro = '';
$mensagem = '';
$classe = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = trim($_POST['login']);
    $senha = trim($_POST['senha']);

    $sql = "SELECT usuarios, senha FROM users WHERE usuarios = ?";
    $stmt = $con->prepare($sql);
    $stmt->execute([$usuario]);
    $user = $stmt->fetch();

    if ($user) {
        if (password_verify($senha, $user['senha'])) {
            $_SESSION['usuario'] = $user['usuarios'];
            $mensagem = "Login efetuado com sucesso! Você será redirecionado para o painel...";
            $classe = "mensagem";
            $redirect ="painel.php";
        } else {
            $erro = "Senha incorreta.";
            $classe = "mensagem erro";
        }
    } else {
        $erro = "Usuário não encontrado.";
        $classe = "mensagem erro";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
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

        <h2>Login</h2>

        <?php if (!empty($mensagem)): ?>
            <div class="<?php echo $classe; ?>">
                <?php echo $mensagem; ?>
            </div>
        <?php elseif (!empty($erro)): ?>
            <div class="<?php echo $classe; ?>">
                <?php echo $erro; ?>
            </div>
        <?php endif; ?>

        <?php if (empty($redirect)): ?>
            <form method="POST" action="">
                <input type="text" name="login" placeholder="Usuário" required>
                <input type="password" name="senha" placeholder="Senha" required>
                <button type="submit">Entrar</button>
            </form>
            <a href="cadastro.php">Ainda não tem cadastro? Clique aqui</a>
        <?php endif; ?>
        </div>
    </body>
</html>
