<?php
session_start();
include './conexao/conexao.php';

if (!isset($_SESSION['cliente'])) {
    header('Location: login.php');
    exit();
}

$cliente = $_SESSION['cliente'];
$stmt = $conection->prepare("SELECT * FROM evento WHERE publicador_evento = ?");
$stmt->execute([$cliente]);
$eventos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="./css/perfil.css">
</head>
<body>
    <nav class="navBar">
        <img src="./img/logoElds.png" alt="" class="logo">
        <div class="bot">
            <a href="./home.php" class="link">
                Home
                <div class="li"></div>
            </a>
            <a href="cards.php" class="link">
                Eventos-Online
                <div class="li"></div>
            </a>
            <a href="./cadastro_evento.php" class="link">
                Cadastrar Novo Evento
                <div class="li"></div>
            </a>
        </div>
    </nav>
    <div class="container">
        <div class="info-cliente">
    
        </div>
        <div class="div-cards">
            <?php if (count($eventos) > 0): ?>
            <div class="cards-container">
                <?php foreach ($eventos as $evento): ?>
                <div class="card">
                    <img class="img-card" src="<?= htmlspecialchars($evento['foto_evento']) ?>" alt="Imagem do Evento">
                    <div class="info-card">
                        <p class="nome-evento"><?= htmlspecialchars($evento['nome_evento']) ?></p>
                        <p class="data-evento">Data:<?= $evento['data_evento'] ?></p>
                        <p class="desc-evento"><?= htmlspecialchars($evento['desc_evento']) ?></p>
                        <a class="bot-editar" href="./atualizar_evento.php?id=<?= $evento['id_evento'] ?>">Editar</a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php else: ?>
                <p class="aviso">Você ainda não cadastrou nenhum evento.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>