<?php
session_start();
include './conexao/conexao.php';

if (!isset($_SESSION['cliente'])) {
    header('Location: login.php');
    exit();
}
if (!isset($_GET['id'])) {
    echo "ID do evento não fornecido.";
    exit;
}

$id_evento = $_GET['id'];
$cliente = $_SESSION['cliente'];

$mensagem = '';

$stmt = $conection->prepare("SELECT * FROM evento WHERE id_evento = ? AND publicador_evento = ?");
$stmt->execute([$id_evento, $cliente]);
$evento = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$evento) {
    echo "Evento não encontrado ou você não tem permissão para editá-lo.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nv_nome_evento = $_POST['nv-nome-evento'];
    $nv_data_evento = $_POST['nv-data-evento'];
    $nv_desc_evento = $_POST['nv-desc-evento'];
    $imagem_atual = $evento['foto_evento'];

    if (isset($_FILES['foto_evento']) && $_FILES['foto_evento']['error'] === 0) {
        $extensoes_permitidas = ['jpg', 'jpeg', 'png', 'gif'];
        $extensao = strtolower(pathinfo($_FILES['foto_evento']['name'], PATHINFO_EXTENSION));

        if (!in_array($extensao, $extensoes_permitidas)) {
            echo "Tipo de arquivo inválido.";
            exit;
        }

        $nv_foto_evento = uniqid('img_') . '.' . $extensao;
        $caminho = './uploads/eventos/' . $nv_foto_evento;

        if (move_uploaded_file($_FILES['foto_evento']['tmp_name'], $caminho)) {
            if (!empty($imagem_atual) && file_exists('./uploads/eventos/' . $imagem_atual)) {
                unlink('./uploads/eventos' . $imagem_atual);
            }
            $imagem_final = "./uploads/eventos/" . $nv_foto_evento;
        } else {
            echo "Erro ao fazer upload da nova imagem.";
            exit;
        }
    } else {
        $imagem_final = $imagem_atual;
    }

    $stmt = $conection->prepare("UPDATE evento SET nome_evento = ?, data_evento = ?, desc_evento = ?, foto_evento = ? WHERE id_evento = ? AND publicador_evento = ?");
    $stmt->execute([$nv_nome_evento, $nv_data_evento, $nv_desc_evento, $imagem_final, $id_evento, $cliente]);

    $mensagem = "Evento atualizado com sucesso!";

    // Atualiza $evento para refletir os dados novos
    $stmt = $conection->prepare("SELECT * FROM evento WHERE id_evento = ? AND publicador_evento = ?");
    $stmt->execute([$id_evento, $cliente]);
    $evento = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <?php if(empty($mensagem)): ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <div>
                <input type="text" name="nv-nome-evento" id="nome-evento" value="<?= htmlspecialchars($evento['nome_evento']) ?>">
                <input type="date" name="nv-data-evento" id="data-evento" value="<?= htmlspecialchars($evento['data_evento']) ?>">
                <textarea name="nv-desc-evento" id="desc-evento"><?= htmlspecialchars($evento['desc_evento']) ?></textarea>
            </div>
            <div>
                <img src="<?= htmlspecialchars($evento['foto_evento']) ?>" alt="">
                <label for="foto-evento"><svg class="icone-foto" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M3 4V1h2v3h3v2H5v3H3V6H0V4zm3 6V7h3V4h7l1.83 2H21c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H5c-1.1 0-2-.9-2-2V10zm7 9c2.76 0 5-2.24 5-5s-2.24-5-5-5s-5 2.24-5 5s2.24 5 5 5m-3.2-5c0 1.77 1.43 3.2 3.2 3.2s3.2-1.43 3.2-3.2s-1.43-3.2-3.2-3.2s-3.2 1.43-3.2 3.2"/></svg></label>
                <input type="file" name="foto_evento" id="foto-evento" hidden>
            </div>
            <div>
                <button type="submit">Salvar Atualizações</button>
            </div>
        </form>
        <?php else:?>
            <div>
                <p><?= $mensagem ?></p>
            </div>
        <?php endif?>
    </div>
    <?php if(!empty($mensagem)):?>
    <script>
        setTimeout(() => {
            window.location.href = './perfil.php';
        }, 3000);
    </script>
    <?php endif?>
</body>
</html>