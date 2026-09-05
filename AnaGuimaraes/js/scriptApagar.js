
function msg(text) {

    alert(text);
    window.location.href = "listar.php";

}

function confirmacao(nome, id) {
    if (confirm("Você realmente deseja excluir o livro "+ nome +"?")) {
        window.location.href = 'apagar.php?id='+id;
    }
}