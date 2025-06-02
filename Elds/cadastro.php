<?php
include './conexao/conexao.php';

$mensagem = '';
$classe = '';
$erro = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['foto']) && $_FILES['foto']['error'] == 0){

    $foto = $_FILES['foto'];
    $foto_nome = $foto['name'];
    $foto_temp = $foto['tmp_name'];
    $foto_mb = $foto['size'];
    $erro_foto = $foto['error'];

    $extensao = pathinfo($foto_nome, PATHINFO_EXTENSION);
    $extensao = strtolower($extensao);

    $type_foto = ['jpg','png','jpeg','gif'];

    if (empty($extensao) || !in_array($extensao, $type_foto)) {
        echo "<script>
            alert('Erro: Tipo de arquivo inválido. Apenas imagens JPG, JPEG, PNG e GIF são permitidas.');
            window.location.href = './cadastro.php';
        </script>";
        exit;
    }
    $uploads = './uploads/clientes/';
    $linhaFoto = 1;

    while (file_exists($uploads . "foto" . $linhaFoto . "." . $extensao)) {
        $linhaFoto++;
    }
    $nova_foto = "foto" . $linhaFoto . '.' . $extensao;
    $caminho = $uploads . $nova_foto;


    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);
    $confirme_senha = trim($_POST['confirmar-senha']);
    

    if (empty($nome) || empty($email) || empty($senha) || empty($confirme_senha)) {
        $mensagem = "Preencha todos os campos.";
        $classe = 'erro';
    }else {
        if($senha != $confirme_senha){
            $mensagem = "O confirmar da senha está diferente dá senha.";
            $classe =  'erro';
        }else {
            $sql = "SELECT COUNT(*) FROM cliente WHERE nome_cliente = ? AND email_cliente = ?";
            $stmt = $conection->prepare($sql);
            $stmt->execute([$nome, $email]);
            if ($stmt->fetchColumn() > 0) {
                $mensagem = "Email ou nome de usario já utilizado. Escolha outro.";
                $classe = 'erro';
            }else {
                if(!move_uploaded_file($foto_temp, $caminho)){
                    $mensagem = "Foto não guardada";
                    $classe = 'erro';
                }else {
                    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
                    $sql = "INSERT INTO cliente (nome_cliente, email_cliente, senha_cliente, foto_cliente) VALUES (?, ?, ?, ?)";
                    $stmt = $conection->prepare($sql);
                    if ($stmt->execute([$nome,$email,$senha_hash,$caminho])) {
                        $mensagem = "Cadastro realizado com sucesso! Você será redirecionado para o login...";
                        $redirect = "login.php";
                    }else {
                        $mensagem = "Erro ao cadastrar usuário.";
                        $classe = 'erro';
                    }
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Elds</title>
    <link rel="stylesheet" href="./css/cadastro.css">

    <?php if(!empty($redirect)): ?>
        <script>
            setTimeout(() => {
                window.location.href = "<?php echo $redirect; ?>";
            }, 3000);
        </script>
    <?php endif; ?>
</head>
<body>
    <div class="container">
        <?php if(empty($redirect)):?>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="img-perfil">   
                    <img src="./img/Foto vazia.jpg" alt="Sem foto" id="foto-vazia" class="img-vazia">
                    <input type="file" name="foto" id="foto-perfil" accept="image/*" onchange="previaImg()" hidden>
                    <label for="foto-perfil"><svg class="icone-foto" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M3 4V1h2v3h3v2H5v3H3V6H0V4zm3 6V7h3V4h7l1.83 2H21c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H5c-1.1 0-2-.9-2-2V10zm7 9c2.76 0 5-2.24 5-5s-2.24-5-5-5s-5 2.24-5 5s2.24 5 5 5m-3.2-5c0 1.77 1.43 3.2 3.2 3.2s3.2-1.43 3.2-3.2s-1.43-3.2-3.2-3.2s-3.2 1.43-3.2 3.2"/></svg></label>
                </div>
                <?php if(!empty($mensagem)): ?>
                <div>
                    <p class="<?php echo $classe ?>"><?php echo $mensagem ?></p>
                </div>
                <?php endif; ?>
                <div class="info-cad">
                    <div class="input-cad">
                        Nome:<input type="text" name="nome" id="nome">
                    </div>
                    <div class="input-cad">
                        Email:<input type="email" name="email" id="email">
                    </div>
                    <div class="input-cad">
                        Senha:<input type="password" name="senha" id="senha">
                    </div>
                    <div class="input-cad">
                        Confirmar Senha:<input type="password" name="confirmar-senha" id="confirmar-senha">
                    </div>
                </div>
                <div>
                    <button type="submit">Cadastrar</button>
                </div>
                <div>
                    <a href="./login.php">Já tenho login? Clique aqui</a>
                </div>
            </form>
        <?php else: ?>
        <div>
            <p class="sucesso"><?php echo $mensagem ?></p>
        </div>
        <?php endif?>
    </div>
</body>
</html>