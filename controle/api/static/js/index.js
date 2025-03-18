async function Login(event) {
    event.preventDefault();
    const email = document.getElementById("email").value;
    const senha = document.getElementById("senha").value;
    const csrf = document.querySelector("[name=csrfmiddlewaretoken]").value

    const response = await apiRequest("/api/login/", "POST", { nome: email, senha: senha }, { "X-CSRFToken": csrf })


    if (response.status == 200) {
        console.log("logado!")
        window.location.href = "/home";
    } else {
        const msg = document.getElementById("msg")
        msg.innerHTML = 'Login inválido!'
    }
}


document.getElementById("loginForm").addEventListener("submit", Login);