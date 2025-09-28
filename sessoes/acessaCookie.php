<?php
echo "<h1>Seu Carrinho de Compras Wepink</h1>";

if (isset($_COOKIE['carrinho'])) {
    $carrinho = json_decode($_COOKIE['carrinho'], true);
    
    if (!empty($carrinho)) {
        echo "<ul>";
        foreach ($carrinho as $item) {
         
            echo "<li>" . htmlspecialchars($item) . "</li>"; 
        }
        echo "</ul>";
    } else {
        echo "<p>Seu carrinho está vazio.</p>";
    }
} else {
    echo "<p>Seu carrinho está vazio.</p>";
}

echo "<a href='../sessoes/menu.php'>Continuar Comprando</a>";
?>