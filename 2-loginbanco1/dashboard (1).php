<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}

$usuario = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>

  <div class="container">
    <h2>Bem-vindo, <?php echo htmlspecialchars($usuario); ?>!</h2>

    <div class="botoes">
      <a href="cadastrar_evento.php" class="botao">Cadastrar Evento</a>
      <a href="atualizar_evento.php" class="botao">Atualizar Evento</a>
      <a href="listar_evento.php" class="botao">Listar Eventos</a>
      <a href="logout.php" class="botao sair">Sair</a>
    </div>
  </div>

</body>
</html>
