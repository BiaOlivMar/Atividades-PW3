<?php
require 'Class.php';

if (isset($_POST['nome'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $foi = $usuario = new Usuario();

    if (!$foi) {
        echo "
        <script>
            confirm('Erro ao conectar. Tenta depois :(');
        </script>";
    }else{
        $tem = $usuario->cadastra($nome, $email, $senha);
        if($tem){
            echo "
            <script>
                confirm('FOI!! Usuario inserido com sucesso!');
            </script>";
        }else{
            echo"
            <script>
                confirm('Erro ao CADASTRAR. Tenta depois :(');
            </script>";
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cadastro</title>
</head>
<body>
    <div class="cad">
        <h1>Cadastro</h1>
        <form method="post" action="">
            <input type="text" name="nome" placeholder="Nome">
            <input type="text" name="email" placeholder="E-mail">
            <input type="password" name="senha" placeholder="Senha">
            <button type="submit" name="btnCad">Cadastrar</button>
        </form>
    </div>
</body>
</html>