function voltar(){
    window.location.href = "/home";
}

document.getElementById('voltar').addEventListener("click", voltar)

document.addEventListener("DOMContentLoaded", function(){

    async function GetUserLogado(){
        const response = await apiRequest('/api/GetDadosUsuarioLogado')
        const usuarioId = document.getElementById('usuarioId')
        usuarioId.value = response.id
        
    }

    GetUserLogado()

    async function CadastrarGasto(event) {
        event.preventDefault();
        const usuarioId = document.getElementById('usuarioId').value
        var titulo = document.getElementById("titulo").value;
        var descricao = document.getElementById("descricao").value;
        var valor = document.getElementById("valor").value
        var dataGasto = document.getElementById("dataGasto").value
        var horario = document.getElementById("horario").value
        const csrf = document.querySelector("[name=csrfmiddlewaretoken]").value

        if (!descricao){
            descricao = null
        }

        if (!dataGasto){
            dataGasto = null
        }
        
        if (!horario){
            horario = null
        }
    

        const resposta = await apiRequest("/api/gastos/", "POST", 
            { titulo: titulo, valor: valor, horario: horario, dataGasto: dataGasto, descricao: descricao,usuario : usuarioId },
             { "X-CSRFToken": csrf })
        

        var msg = document.getElementById('msg') 

        if(resposta){
            msg.innerHTML = 'Gasto realizado!'
            document.getElementById('titulo').value = ''
            document.getElementById('valor').value = ''
            document.getElementById('horario').value = ''
            document.getElementById('dataGasto').value = ''
            document.getElementById('descricao').value = ''
            
        }
        else{
            msg.innerHTML = 'Erro ao cadastrar!'
        }

      
    }
    document.getElementById("cadastroGasto").addEventListener("submit", CadastrarGasto);
   
})
