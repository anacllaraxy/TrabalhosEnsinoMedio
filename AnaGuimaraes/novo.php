
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casdastrar Novo Livro</title>
    <link rel="stylesheet" href="css/styleNovo.css">
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
                    <input type="text"  placeholder="Título" name="titulo" id="titulo"  required>
                    <i class=''></i>
                    <span class="error"></span>
                </div>
                <div class="input">
                    <input type="autor" placeholder ="Autor" name="autor" id="autor"  required>
                    <i class=''></i>
                    <span class="error"></span>
                </div>
                <div class="input">
                <select id="genero" name="genero" required>
                    <option value="" >Selecione um gênero</option>
                    <option value="Fiçãao">Ficção</option>
                    <option value="Fantasia">Fantasia</option>
                    <option value="Romance">Romance</option>
                    <option value="Suspense">Suspense</option>
                    <option value="Terror">Terror</option>
                    <option value="Biografia">Biografia</option>
                    <option value="Histórico">Histórico</option>
                    <option value="Autoajuda">Autoajuda</option>
                    <option value="científico">Científico</option>
                    <option value="Poesia">Poesia</option>
                </select>
                </div>
                <div class="input">
                    <input type="number" id="ano" name="ano" min="1800" max="2025" placeholder="Ano de publicação" required>
                    <i class=''></i>
                    <span class="error"></span>
                </div>
                <div class="input">
                    <input type="float" id="preco" name="preco" min="10" placeholder="Preço" required>
                    <i class=''></i>
                    <span class="error"></span>
                </div>
                <button type="submit" class="btn">Registrar</button>
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

            $cod = "SELECT * FROM livros WHERE titulo = '$titulo' AND autor = '$autor'" ;
            $query = mysqli_query($conexao, $cod);

            if (mysqli_num_rows($query) > 0) {
                
               //erro 
               ?><script>
                        msg("Erro livro já cadastrado.\n");
                    </script><?php
            
            } else {

                $cod = "INSERT INTO livros ( titulo, autor, genero, ano_publicacao, preco) 
                VALUES ('$titulo','$autor','$genero','$ano','$preco')";
                $query = mysqli_query($conexao, $cod);
                
                if($query){

                    // cadastrar

                    ?><script>
                        msg("Livro cadastrar com sucesso na biblioteca!");
                    </script><?php

                }else{

                    ?><script>
                        msg("Erro ao cadastrar livro!");
                    </script><?php  

                }              

            }
            } else {

            ?>
                <script>
                    msg("Erro: Conexão ao banco de dados mal sucedida!");
                </script>?><?php
        }
        
    }}
    ?>

</body>
</html>