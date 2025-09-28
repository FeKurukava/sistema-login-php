<?php
$produto = isset($_GET['produto']) ? $_GET['produto'] : '';

if ($produto) {

    $carrinho = isset($_COOKIE['carrinho']) ? json_decode($_COOKIE['carrinho'], true) : [];


    $carrinho[] = $produto;


    setcookie("carrinho", json_encode($carrinho), time() + 86400, "/"); 


    header("Location: ../sessoes/menu.php");
    exit;
} else {
    echo "Nenhum produto especificado.";
}
?>