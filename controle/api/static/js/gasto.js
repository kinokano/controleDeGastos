function voltar(){
    window.location.href = "/home";
}

document.getElementById('voltar').addEventListener("click", voltar)

document.addEventListener("DOMContentLoaded", function(){
    async function GetUserLogado(){
        const response = await apiRequest('/api/GetDadosUsuarioLogado')
        const usuario = response.id
    }
    
    GetUserLogado()

    async function CadastrarGasto(event) {
        event.preventDefault();
        const titulo = document.getElementById("titulo").value;
        const descricao = document.getElementById("descricao").value;
        const valor = document.getElementById("valor").value
        const dataGasto = document.getElementById("dataGasto").value
        const horario = document.getElementById("horario").value
        const csrf = document.querySelector("[name=csrfmiddlewaretoken]").value

        const resposta = await apiRequest("/api/gastos/", "POST", { titulo: titulo, descricao: descricao, valor: valor, dataGasto: dataGasto, horario: horario, usuario : usuario }, { "X-CSRFToken": csrf })


        if (resposta.status == 201) {
            const msg = document.getElementById("msg")
            msg.innerHTML = 'Gasto cadastrado!'
        } else {
            const msg = document.getElementById("msg")
            msg.innerHTML = 'Erro!'
        }
    }

    document.getElementById("cadastroGasto").addEventListener("submit", CadastrarGasto);
})

