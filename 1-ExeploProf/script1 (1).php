<?php
// Conectar ao banco de dados
include 'conexao1.php';

// Verificando se o formulário foi enviado e se o arquivo foi carregado
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {

    // Obtendo os dados do formulário
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $email = $_POST['email'];

    // Processando a foto
    $foto = $_FILES['foto'];
    $foto_nome = $foto['name'];
    $foto_temp = $foto['tmp_name'];
    $foto_tamanho = $foto['size'];
    $foto_erro = $foto['error'];

    // Validando se a foto tem um tipo de arquivo correto (imagem)
    $extensao = pathinfo($foto_nome, PATHINFO_EXTENSION);
    $extensao = strtolower($extensao); // Convertendo para minúsculo

    // Definindo as extensões permitidas
    $extensoes_permitidas = ['jpg', 'jpeg', 'png', 'gif'];

    // Se a extensão não for válida, não envia o arquivo
    if (!in_array($extensao, $extensoes_permitidas)) {
        echo "Erro: Tipo de arquivo inválido. Apenas imagens JPG, JPEG, PNG e GIF são permitidas.";
        exit;
    }

    // Definindo o caminho da pasta de uploads
    $pasta_upload = 'uploads/';

    // Verificando o último arquivo de foto para gerar o próximo número sequencial
    $contador = 1;

    // Verificando se já existe uma foto com o mesmo nome
    // Loop para encontrar o próximo nome disponível
    while (file_exists($pasta_upload . "foto" . $contador . "." . $extensao)) {
        $contador++;
    }

    // Gerando o nome único da foto (foto1, foto2, ...)
    $novo_nome_foto = "foto" . $contador . '.' . $extensao;
    $caminho_foto = $pasta_upload . $novo_nome_foto;

    // Movendo o arquivo para o diretório de uploads
    if (move_uploaded_file($foto_temp, $caminho_foto)) {
        // Inserir os dados no banco de dados
        try {
            // Comando para inserir os dados na tabela
            $comando = "INSERT INTO cadastro_aluno (nome, idade, email, foto) VALUES (?, ?, ?, ?)";
            $stmt = $con->prepare($comando);
            $stmt->bindParam(1, $nome);
            $stmt->bindParam(2, $idade);
            $stmt->bindParam(3, $email);
            $stmt->bindParam(4, $novo_nome_foto); // Salvando o nome da foto no banco

            // Executando o comando
            $stmt->execute();

            // Exibindo uma mensagem de sucesso e redirecionando para o index1.html
            echo "<!DOCTYPE html>
            <html lang='pt-BR'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Cadastro Realizado</title>
                <link rel='stylesheet' type='text/css' href='style1.css'>
            </head>
            <body>
                <div class='message'>
                    <h1>Cadastro realizado com sucesso!</h1>
                    <p>Você será redirecionado para a página de cadastro em 3 segundos.</p>
                    <p class='timer' id='countdown'>3</p>
                </div>
                <script>
                    let countdown = 3;
                    let timer = setInterval(function() {
                        countdown--;
                        document.getElementById('countdown').textContent = countdown;
                        if (countdown === 0) {
                            clearInterval(timer);
                            window.location.href = 'index1.html';
                        }
                    }, 1000);
                </script>
            </body>
            </html>";

        } catch (PDOException $erro) {
            echo "Erro: " . $erro->getMessage();
        }
    } else {
        echo "Erro ao fazer o upload da foto.";
    }
} else {
    echo "Nenhuma foto foi selecionada ou houve erro no upload.";
}
?>