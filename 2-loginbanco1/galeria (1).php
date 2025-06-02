<?php
include 'conexao.php';

$stmt = $con->prepare("SELECT * FROM eventos ORDER BY data_evento DESC");
$stmt->execute();
$eventos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Galeria de Eventos</title>
  <link rel="stylesheet" href="css/style1.css">
</head>
<body>
  <div class="galeria-container">
    <h2 class="galeria-titulo">Galeria de Eventos</h2>

    <?php if (count($eventos) > 0): ?>
      <div class="card-grid">
        <?php foreach ($eventos as $evento): ?>
          <div class="card">
            <img src="uploads/<?= htmlspecialchars($evento['imagem']) ?>" alt="Imagem do evento">
            <div class="card-body">
              <div class="card-title"><?= htmlspecialchars($evento['titulo']) ?></div>
              <div class="card-date">Data: <?= date('d/m/Y', strtotime($evento['data_evento'])) ?></div>
              <div class="card-desc"><?= nl2br(htmlspecialchars($evento['descricao'])) ?></div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php else: ?>
      <p class="mensagem-vazia">Nenhum evento encontrado.</p>
    <?php endif; ?>
  </div>
</body>
</html>
