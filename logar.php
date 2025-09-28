<?php
session_start();

if (!isset($_POST['user']) || !isset($_POST['senha'])) {
    header("Location: login.php?erro=1");
    exit;
}

$usuario = $_POST['user'];
$senha   = $_POST['senha'];

$usuarios_validos = [
    'jose' => '4321',
    'maria' => '1234'
];

if (isset($usuarios_validos[$usuario]) && $usuarios_validos[$usuario] === $senha) {
    $_SESSION["usuario"] = $usuario;
    header("Location: menu.php");
    exit;
} else {
    header("Location: login.php?erro=1");
    exit;
}

