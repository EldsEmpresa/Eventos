<?php
session_start();
include './conexao/conexao.php';

if (!isset($_SESSION['cliente'])) {
    header('Location: home.php');
    exit();
}

$mensagem = '';
$class = 'erro';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['foto-evento']) && $_FILES['foto-evento']['error'] == 0){

    $foto = $_FILES['foto-evento'];
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
            window.location.href = './cadastro_evento.php';
        </script>";
        exit;
    }
    $uploads = './uploads/eventos/';
    $contador = 1;

    $files = glob($uploads . "evento*.*");
    $num_eventos = [];
    foreach ($files as $arquivo) {
        if (preg_match('/evento(\d+)\./', basename($arquivo), $iguais)) {
            $num_eventos[] = (int)$iguais[1];
        }
    }

    if (!empty($num_eventos)) {
        $contador = max($num_eventos) + 1;
    }

    $nome_final_evento = "evento" . $contador . "." . $extensao;
    $caminho = $uploads . $nome_final_evento;

    $nome_evento = $_POST['nome-evento'];
    $data_evento = $_POST['data-evento'];
    $desc_evento = $_POST['desc-evento'];

    if(empty($nome_evento) || empty($data_evento) || empty($desc_evento) || empty($foto)){
        $mensagem = "Preencha todos os campos";
        $class = 'erro';
    }else {
        if(!move_uploaded_file($foto_temp, $caminho)){
            echo "<script>
                alert('Erro em fazer upload da imagem do evento');
                window.location.href = './cadastro_evento.php';
            </script>";
        }else {
            try {
                $stmt = $conection->prepare("INSERT INTO evento (nome_evento, data_evento, desc_evento, foto_evento, publicador_evento) VALUES (?, ?, ?, ?, ?)");
                $stmt->execute([$nome_evento, $data_evento, $desc_evento, $caminho, $_SESSION['cliente']]);
                $mensagem = "Cadastro do evento realizado com sucesso!";
                $class = '';
            }catch (PDOException $e){
                echo "<script>
                    alert('Erro ao fazer cadastro do evento');
                    window.location.href = './cadastro_evento.php';
                </script>";
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
    <title>Cadastrar Evento</title>
</head>
<body>
    <div class="container">
        <?php if(!empty($class)):?>
        <form action="" method="POST" enctype="multipart/form-data">
            <?php if($class == "erro"):?>
                <div>
                    <p class="<?php echo $class ?>"><?php echo $mensagem ?></p>
                </div>
            <?php endif?>
            <div>
                <input type="text" name="nome-evento" id="nome-evento">
                <input type="date" name="data-evento" id="data-evento">
                <textarea name="desc-evento" id="desc-evento"></textarea>
            </div>
            <div>
                <img src="./img/img-generica-de-evento.jpg" alt="">
                <label for="foto-evento"><svg class="icone-foto" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M3 4V1h2v3h3v2H5v3H3V6H0V4zm3 6V7h3V4h7l1.83 2H21c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H5c-1.1 0-2-.9-2-2V10zm7 9c2.76 0 5-2.24 5-5s-2.24-5-5-5s-5 2.24-5 5s2.24 5 5 5m-3.2-5c0 1.77 1.43 3.2 3.2 3.2s3.2-1.43 3.2-3.2s-1.43-3.2-3.2-3.2s-3.2 1.43-3.2 3.2"/></svg></label>
                <input type="file" name="foto-evento" id="foto-evento" hidden>
            </div>
            <div>
                <button type="submit">Cadastrar Evento</button>
            </div>
        </form>
        <?php else: ?>
        <div>
            <p><?php echo $mensagem ?></p>
        </div>
        <script>
            setTimeout(() => {
                window.location.href = "./perfil.php";
            }, 3000);
        </script>
        <?php endif;?>
    </div>
</body>
</html>