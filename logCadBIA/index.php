<?php
require 'Class.php';

if (isset($_POST['email']) && isset($_POST['senha'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $usuario = new Usuario();
    $logado = $usuario->chkPass($email, $senha);

    if ($logado) {
        echo "
        <script>
            alert('Logiou ai hein!');
        </script>";
    } else {
        echo "
        <script>
            alert('Email ou senha inválidos!');
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="cad">
        <h1>Login</h1>
        <form method="POST" action="">
            <input type="text" name="email" placeholder="E-mail" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <button type="submit">Entrar</button>
            <p>Não tem uma conta? <a href="Cadastro.php">Cadastre-se aqui</a></p>
        </form>
    </div>
</body>
</html>
