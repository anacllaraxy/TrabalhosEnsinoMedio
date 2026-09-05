<?php
    if(isset($_GET['id']))
    {
        require "./connect/conexao.php";

        $id = $_GET['id'];
        $query = "SELECT * FROM livros WHERE id = {$id}";

        $result = mysqli_query($conexao,$query);
        $livro = mysqli_fetch_row($result);

        mysqli_close($conexao);
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Alterar Dados Livro </title>
    <link rel="stylesheet" href="css/styleN.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="caixa-principal">
    <div class="img">
            <div class="img box1">
            
            </div>
        </div>
        <div class="form">
        <div class="div-topo"><button class="btn-topo" onclick="window.location.href='listar.php'">X</button></div>
    
        
            <form action="" method="POST" id="form" name="form">
                <h1>Cadastrar livro</h1>
                <div class="input">
                    <input type="text"  placeholder="Título" name="titulo" id="titulo" required value="<?= $livro[1] ?>">
                    <i class=''></i>
                    <span class="error"></span>
                </div>
                <div class="input">
                    <input type="autor" placeholder ="Autor" name="autor" id="autor"  required value="<?= $livro[2] ?>">
                    <i class=''></i>
                    <span class="error"></span>
                </div>
                <div class="input">
                <select id="genero" name="genero" required>
                    <option value="" disabled <?= empty($livro[3]) ? 'selected' : '' ?>>Selecione um gênero</option>
                    <option value="Ficção" <?= $livro[3] === 'Ficção' ? 'selected' : '' ?>>Ficção</option>
                    <option value="Fantasia" <?= $livro[3] === 'Fantasia' ? 'selected' : '' ?>>Fantasia</option>
                    <option value="Romance" <?= $livro[3] === 'Romance' ? 'selected' : '' ?>>Romance</option>
                    <option value="Suspense" <?= $livro[3] === 'Suspense' ? 'selected' : '' ?>>Suspense</option>
                    <option value="Terror" <?= $livro[3] === 'Terror' ? 'selected' : '' ?>>Terror</option>
                    <option value="Biografia" <?= $livro[3] === 'Biografia' ? 'selected' : '' ?>>Biografia</option>
                    <option value="Histórico" <?= $livro[3] === 'Histórico' ? 'selected' : '' ?>>Histórico</option>
                    <option value="Autoajuda" <?= $livro[3] === 'Autoajuda' ? 'selected' : '' ?>>Autoajuda</option>
                    <option value="Científico" <?= $livro[3] === 'Científico' ? 'selected' : '' ?>>Científico</option>
                    <option value="Poesia" <?= $livro[3] === 'Poesia' ? 'selected' : '' ?>>Poesia</option>
                </select>

                <div class="input">
                    <input type="number" id="ano" name="ano" min="1800" max="2025" placeholder="Ano de publicação" required value="<?= $livro[4] ?>">
                    <i class=''></i>
                    <span class="error"></span>
                </div>
                <div class="input">
                    <input type="float" id="preco" name="preco" min="10" placeholder="Preço" required value="<?= $livro[5] ?>">
                    <i class=''></i>
                    <span class="error"></span>
                </div>
                <button type="submit" class="btn">Salvar Alteração</button>
            </form>
        </div>
    </div>

    <script src="./js/scriptNovo.js"></script>

<?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $genero = $_POST["genero"];
        $ano = $_POST["ano"];

        if($genero != "" && $ano >= 1800 && $ano <= 2025){
        
        require './connect/conexao.php';
        
        if (isset($conexao)){

            $preco = $_POST["preco"];
            $titulo = $_POST["titulo"];
            $autor = $_POST["autor"];

            //pega id 

                $cod = "UPDATE livros SET titulo='$titulo', autor='$autor', genero='$genero',
                ano_publicacao='$ano', preco='$preco' WHERE id = $id";
                $query = mysqli_query($conexao, $cod);
                
                if($query){

                    //salvo
                    ?><script>
                        msg("Alteração Salva!");
                    </script><?php

                }else{

                    ?><script>
                        msg("Erro ao atualizar dados do livro!");
                    </script><?php  

                }              

            }

            } else {

            ?>
                <script>
                    msg("Erro: Conexão ao banco de dados mal sucedida!");
                </script>?><?php
        }

        mysqli_close($conexao);
        
    }}
    ?>

</body>
</html>