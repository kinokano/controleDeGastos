document.addEventListener("DOMContentLoaded", function(){
    async function GetUserLogado(){
        const response = await apiRequest('/api/GetDadosUsuarioLogado')
        const div = document.getElementById('nomeUsuario')
        div.innerHTML = 'Bem vindo ' + response.first_name
    }
    
    GetUserLogado()
})

function gasto(){
    window.location.href = "/gasto";
}

document.getElementById('gasto').addEventListener("click", gasto)


function logout(){
    window.location.href = "/logout";

}

document.getElementById('logout').addEventListener("click", logout)
