<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index | Login</title>
    <link rel="stylesheet" href="css/styleIndex.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="caixa-principal">
    <div class="img">
            <div class="img box1">
            </div>
        </div>
        <div class="form">
            <form action="" method="POST" id="form" name="form">
                <h1>Login</h1>
                <div class="input">
                    <input type="email"  placeholder="E-mail" name="email" id="email"  required>
                    <i class='bx bxs-user'></i>
                    <span class="error"></span>
                </div>
                <div class="input">
                    <input type="password" placeholder ="Senha" name="senha" id="senha"  minlength="3" required>
                    <i class='bx bxs-lock-alt'></i>
                    <span class="error"></span>
                </div>
                <button type="submit" class="btn">Login</button>
            </form>
        </div>
    </div>

    <script src="./js/scriptIndex.js"></script>

<?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        require './connect/conexao.php';

        $email = $_POST['email'];
        $senha = $_POST['senha'];

        if (isset($conexao)) {

            $cod = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'" ;
            $query = mysqli_query($conexao, $cod);

            if (mysqli_num_rows($query) > 0) {
                
               ?>
                <script>
                    document.getElementById('form').reset();
                    msg("Seja bem-Vindo(a)! \nConta logada.");
                    window.location.href = 'listar.php';
                </script><?php
            
            } else {

                ?>
                <script>
                    msg("Verifique seus dados!\nEsta conta não foi encontrada.");
                </script><?php                

            }

        } else {

            ?>
                <script>
                    msg("Erro: Conexão ao banco de dados mal sucedida!");
                </script>?><?php
        }
    }
    ?>

</body>
</html>