<?php

    if(isset($_GET['id'])){

        require "./connect/conexao.php";

        $id = intval($_GET['id']); 
        $query = "DELETE FROM livros WHERE id = '$id'";
        $result = mysqli_query($conexao, $query);

        echo "<script src='./js/scriptApagar.js'></script>";

        if ($result) {

            echo "<script>
                msg('Livro excluído do banco de dados com sucesso!');
            </script>";

        }else{

            echo "<script>
                msg('Erro ao excluir item, por favor tente novamente.');
            </script>";
    
        }


    }


?>