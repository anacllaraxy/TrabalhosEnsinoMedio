<?php

if (isset($_GET['id'])) {

    require "./connect/conexao.php";

    $id = intval($_GET['id']); 
    $query = "SELECT * FROM livros WHERE id = {$id}";
    $result = mysqli_query($conexao, $query);

    if ($result && mysqli_num_rows($result) > 0) {

        $livro = mysqli_fetch_row($result);

    } else {

        $livro = false; 

    }

    mysqli_close($conexao);

} 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Livros</title>
    <link rel="stylesheet" href="./css/stylevisualizar.css">
</head>
<body>

    <div class="caixa-principal">
        <div class="cabecario">
            <div class="titulo">
                <h1>Detalhes do Livro: </h1><h2><?= $livro[1]; ?></h2>
            </div>

            <div class="div-topo"><button class="btn-topo" onclick="window.location.href='listar.php'">X</button></div>

        </div>

        <div class="caixa-table">
            <div class="t1">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Gênero</th>
                        <th>Ano de Publicação</th>
                        <th>Preço</th>
                    </tr>
                </thead>
                <tbody>
                <?php

                    if ($livro) {
                ?>
                    <tr>
                        <td><?= $livro[0]; ?></td>
                        <td><?= $livro[1]; ?></td>
                        <td><?= $livro[2]; ?></td>
                        <td><?= $livro[3]; ?></td>
                        <td><?= $livro[4]; ?></td>
                        <td><?= $livro[5]; ?></td>
                    </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
    
</body>
</html>
