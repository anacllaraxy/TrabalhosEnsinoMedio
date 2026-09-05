const form = document.getElementById('form');
const ano = document.getElementById('ano'); 

ano.addEventListener("blur", (event) =>{
    anoValidar();
})

function anoValidar() {
    const anoValue = ano.value;

    if (anoValue === "") {
        error(ano, "O campo 'Ano de publicação' é obrigatório.");
    } else if (ano > 2025) {
        error(ano, "Insira um ano válido (até 2025).");
    } else if (ano < 1800) {
        error(ano, "Aceitamos apenas livros publicados a partir de 1800.");
    } else {
        error(ano, "");
    }
    
}

function error(btn, msg) {
    const formItem = btn.parentElement;
    const textMensagem = formItem.querySelector("span");

    textMensagem.innerText = msg;
}

function msg(msg) {

    alert(msg);

}