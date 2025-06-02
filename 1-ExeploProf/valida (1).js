// Função para validar e-mail
function validarEmail(email) {
    const regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    return regex.test(email); // Retorna true se o e-mail for válido
}

// Função para validar os campos do formulário
function validarFormulario() {
    // Pegando os valores dos campos
    const nome = document.getElementById("nome_id").value;
    const idade = document.getElementById("_id").value;
    const email = document.getElementById("email_id").value;
    const foto = document.getElementById("foto_id").value; // Verifica se a foto foi selecionada

    // Valida o nome
    if (nome.trim() === "") {
        alert("O campo nome é obrigatório.");
        return false;
    }

    // Valida a idade
    if (idade.trim() === "" || isNaN(idade)) {
        alert("O campo idade é obrigatório e deve ser um número válido.");
        return false;
    }

    // Valida o e-mail
    if (email.trim() === "" || !validarEmail(email)) {
        alert("Por favor, insira um e-mail válido.");
        return false;
    }

    // Valida se uma foto foi selecionada
    if (foto.trim() === "") {
        alert("Por favor, selecione uma foto.");
        return false;
    }

    // Se tudo estiver correto, permite o envio do formulário
    return true;
}

// Função para mostrar a foto pré-visualizada
function previewFoto() {
    const fotoInput = document.getElementById("foto_id");
    const fotoPreview = document.getElementById("foto_preview");

    const file = fotoInput.files[0]; // Pega o primeiro arquivo selecionado

    if (file) {
        const reader = new FileReader();

        reader.onload = function(e) {
            fotoPreview.innerHTML = '<img src="' + e.target.result + '" alt="Foto de perfil" />';
        };

        reader.readAsDataURL(file); // Lê o arquivo e o transforma em URL
    } else {
        fotoPreview.innerHTML = "<p>Pré-visualize sua foto aqui</p>"; // Caso nenhum arquivo seja selecionado
    }
}
