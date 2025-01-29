const botaoTabela = document.getElementById("showTabela")
const tabela = document.getElementById("tabela")


function displayTabela(){
   

    if (tabela.classList.contains('displayOff')) {
        tabela.classList.remove('displayOff');
        botaoTabela.textContent = "Ocultar Tabela";
    } else {
        tabela.classList.add('displayOff');
        botaoTabela.textContent = "Mostrar Tabela";
    }
}

botaoTabela.addEventListener("click", displayTabela);
