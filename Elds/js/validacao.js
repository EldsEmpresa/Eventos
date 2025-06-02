function validarEmail(email) {
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
}

/* function validarCad() {
    const nomeInput = document.getElementById("idNome");
    const idadeInput = document.getElementById("idIdade");
    const emailInput = document.getElementById("idEmail");
    const senhaInput = document.getElementById("idSenha");
    const arquivoInput = document.getElementById("arquivo");

    const nome = nomeInput.value.trim();
    const idade = idadeInput.value.trim();
    const email = emailInput.value.trim();
    const senha = senhaInput.value.trim();
    const arquivo = arquivoInput.files;

    let valido = true;

    if (nome === "") {
        nomeInput.classList.add('obrigatorio');
        valido = false;
    } else {
        nomeInput.classList.remove('obrigatorio');
    }

    if (idade === "") {
        idadeInput.classList.add('obrigatorio');
        valido = false;
    } else if (isNaN(Number(idade))) {
        alert("Digite um número válido para a idade.");
        valido = false;
    } else {
        idadeInput.classList.remove('obrigatorio');
    }

    if (email === "") {
        emailInput.classList.add('obrigatorio');
        valido = false;
    } else if (!validarEmail(email)) {
        alert("Por favor, insira um e-mail válido.");
        valido = false;
    } else {
        emailInput.classList.remove('obrigatorio');
    }

    if (senha.trim() === "") {
        senhaInput.classList.add('obrigatorio');
        valido = false;
    } else if (senha.length < 8) {
        alert("A senha deve ter pelo menos 8 caracteres.");
        valido = false;
    } else {
        senhaInput.classList.remove('obrigatorio');
    }

    if (!arquivoInput.files || arquivoInput.files.length === 0) {
        alert("Selecione uma foto de perfil.");
        valido = false;
    }

    if (valido) {
        document.querySelector("form").submit();
    }
} */

function previaImg() {
    const inputFoto = document.getElementById('arquivo');
    const vazio = document.getElementById('vazio');

    const file = inputFoto.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            vazio.src = e.target.result;
        };
        reader.readAsDataURL(file);
    } else {
        alert("Nenhuma foto carregada");
    }
}