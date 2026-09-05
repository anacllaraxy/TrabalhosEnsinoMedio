const form = document.getElementById('form');
const email = document.getElementById('email');
const senha = document.getElementById('senha');

email.addEventListener("blur", (event) =>{
    emailValidar();
})

function emailValidar() {
    const emailValue = email.value;
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (emailValue === "") {
        error(email, "O campo E-mail é obrigatório!");
    } else if (!emailRegex.test(emailValue)) {
        error(email, "Digite um E-mail válido.");
    } else {
        error(email,'');
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