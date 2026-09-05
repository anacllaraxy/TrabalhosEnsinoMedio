<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Livros</title>
    <link rel="stylesheet" href="./css/styleListar.css">
</head>
<body>

    <div class="caixa-principal">
        <div class="cabecario">
            <div class="titulo">
                <h1>Listagem de Livros</h1>
            </div>

            <div class="btn">
                <button onclick="window.location.href='novo.php';">Novo +</button>
            </div>
        </div>

        <div class="caixa-table">
            <div class="t1">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Título</th>
                        <th>Preço</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                <script src='./js/scriptApagar.js'></script>
                <?php
                    require "./connect/conexao.php";

                    $query = "SELECT * FROM livros";

                    $result = mysqli_query($conexao, $query);

                    $livro = mysqli_fetch_all($result);

                    foreach ($livro as $item) {
                ?>
                    <tr>
                        <td><?= $item[0]; ?></td>
                        <td><?= $item[1]; ?></td>
                        <td><?= $item[2]; ?></td>
                        <td>
                            <a href="alterar.php?id=<?= $item[0] ?>">Alterar</a> |
                            <a href="visualizar.php?id=<?= $item[0] ?>">Visualizar</a> |
                            <a  class="a" onclick="confirmacao('<?= addslashes($item[1]); ?>', <?= $item[0]; ?>);">Excluir</a>
                        </td>
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
