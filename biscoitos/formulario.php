<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    
    $usuario_correto = "admin";
    $senha_correta = "12345";

    if ($usuario == $usuario_correto && $senha == $senha_correta) {
        $_SESSION['usuario'] = $usuario;

        setcookie("usuario_logado", $usuario, time() + (86400), "/");

        header("Location: bem_vindo.php");
    } else {
        echo "Usuário ou senha inválidos.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <form method="post" action="">
        Usuário: <input type="text" name="usuario"><br>
        Senha: <input type="password" name="senha"><br>
        <input type="submit" value="Entrar">
    </form>
</body>
</html>
