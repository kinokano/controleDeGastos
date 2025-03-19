function voltar(){
    window.location.href = "/";
    console.log('teste')
}

document.getElementById('voltar').addEventListener("click", voltar)


async function Cadastrar(event) {
    event.preventDefault();
    const email = document.getElementById("email").value;
    const senha = document.getElementById("senha").value;
    const nome = document.getElementById("nome").value
    const csrf = document.querySelector("[name=csrfmiddlewaretoken]").value

    const response = await apiRequest("/api/user/", "POST", { email: email, nome: nome, senha: senha }, { "X-CSRFToken": csrf })


    if (response.status == 201) {
        console.log("logado!")
        window.location.href = "/home";
    } else {
        const msg = document.getElementById("msg")
        msg.innerHTML = 'Login inválido!'
    }
}


document.getElementById("cadastroForm").addEventListener("submit", Cadastrar);