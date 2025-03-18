document.addEventListener("DOMContentLoaded", function(){
    async function GetUserLogado(){
        const response = await apiRequest('/api/GetDadosUsuarioLogado')
        const div = document.getElementById('nomeUsuario')
        div.innerHTML = response.username
    }
    
    GetUserLogado()
})