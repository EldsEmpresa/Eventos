<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Evento</title>
    <link rel="stylesheet" href="css/style1.css">
</head>
<body>
<div class="container-form">
    <h2>Cadastrar Novo Evento</h2>
    <form action="processa_evento.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" required>
        </div>
        <div class="form-group">
            <label for="data_evento">Data do Evento:</label>
            <input type="date" name="data_evento" required>
        </div>
        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <textarea name="descricao" rows="4" required></textarea>
        </div>
        <div class="form-group">
            <label for="imagem">Imagem:</label>
            <input type="file" name="imagem" accept="image/*" required>
        </div>
        <button type="submit" class="btn">Cadastrar Evento</button>
    </form>

    <?php
    if (isset($_SESSION['msg_sucesso'])) {
        echo "<div class='mensagem sucesso' style='margin-top: 20px;'>{$_SESSION['msg_sucesso']}</div>";
        unset($_SESSION['msg_sucesso']);
    }
    if (isset($_SESSION['msg_erro'])) {
        echo "<div class='mensagem erro' style='margin-top: 20px;'>{$_SESSION['msg_erro']}</div>";
        unset($_SESSION['msg_erro']);
    }
    ?>
</div>
</body>
</html>
