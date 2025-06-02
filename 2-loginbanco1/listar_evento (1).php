<?php
session_start();
include 'conexao.php';

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}

$usuario = $_SESSION['usuario'];
$stmt = $con->prepare("SELECT * FROM eventos WHERE usuario = ?");
$stmt->execute([$usuario]);
$eventos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Meus Eventos</title>
  <link rel="stylesheet" href="css/listar.css">
</head>
<body>
  <div class="container">
    <h2>Meus Eventos</h2>
    <?php if (count($eventos) > 0): ?>
      <div class="cards-container">
        <?php foreach ($eventos as $evento): ?>
          <div class="card">
            <img src="uploads/<?= htmlspecialchars($evento['imagem']) ?>" alt="Imagem do Evento" class="card-img">
            <div class="card-content">
              <h3><?= htmlspecialchars($evento['titulo']) ?></h3>
              <p><strong>Data:</strong> <?= $evento['data_evento'] ?></p>
              <p><?= htmlspecialchars($evento['descricao']) ?></p>
              <a href="atualizar_evento.php?id=<?= $evento['id'] ?>" class="btn-edit">Editar</a>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php else: ?>
      <p>Você ainda não cadastrou nenhum evento.</p>
    <?php endif; ?>
  </div>
</body>
</html>
