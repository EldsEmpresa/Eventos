<?php
session_start();
include './conexao/conexao.php';

$erro = '';
$mensagem = '';
$classe = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);

    $sql = "SELECT * FROM cliente WHERE email_cliente = ?";
    $stmt = $conection->prepare($sql);
    $stmt->execute([$email]);
    $cliente = $stmt->fetch();

    if(empty($email) || empty($senha)){
        $erro = "Preencha os campos em branco";
        $classe = "erro";
    }else{
        if ($cliente) {
            if (password_verify($senha, $cliente['senha_cliente'])) {
                $_SESSION['cliente'] = $cliente['nome_cliente'];
                $_SESSION['email_cliente'] = $cliente['email_cliente'];
                $_SESSION['foto_cliente'] = $cliente['foto_cliente'];
                $mensagem = "Login efetuado com sucesso! Você será redirecinado";
                $classe = "erro";
                $redirect ="home.php";
            } else {
                $erro = "Senha incorreta.";
                $classe = "erro";
            }
        } else {
            $erro = "Usuário não encontrado.";
            $classe = "erro";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>
    <div class="container">
        <?php if (empty($redirect)):?>
        <form class="info" method="POST" action="">
            <div class="text">
                <img class="logo" src="./img/logoElds.png" alt="">
                <p>Login-Page</p>
            </div>
                <p class="aviso"><?php echo $erro?></p>
            <div class="info-login">
                <div class="input-log">
                    Email:<input type="text" name="email" id="email" class="info-login">
                </div>
                <div class="input-log">
                    Senha:<input type="password" name="senha" id="senha" class="info-login">
                </div>
            </div>
            <div class="div-bot">
                <button class="bot" type="submit">Entrar</button>
            </div>
            <div class="link">
                Não tem login ainda?<a href="./cadastro.php">Clique aqui</a>
            </div>
        </form>
        <?php elseif(!empty($redirect)):?>
        <div>
            <p><?php echo $mensagem ?></p>
        </div>
        <script>
            setTimeout(() => {
                window.location.href = "<?php echo $redirect; ?>";
            }, 3000);
        </script>
        <?php endif; ?>
    </div>
</body>
</html>