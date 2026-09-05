<?php 

    $hostname = "localhost";
    $username = "root";
    $password = "";
    $basename = "livros_biblioteca";
    
    $conexao = mysqli_connect($hostname,$username,$password,$basename);

    if(mysqli_errno($conexao)){

        echo "Erro: ". mysqli_error($conexao);

    }

?>