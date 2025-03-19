document.addEventListener("DOMContentLoaded", function(){
    async function GetUserLogado(){
        const response = await apiRequest('/api/GetDadosUsuarioLogado')
        const div = document.getElementById('nomeUsuario')
        div.innerHTML = 'Bem vindo ' + response.first_name
    }
    
    GetUserLogado()
})