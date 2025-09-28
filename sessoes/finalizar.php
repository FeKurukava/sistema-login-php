<?php
session_start();


include __DIR__ . "/produtos.php";

if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirmar'])) {
    $_SESSION['carrinho'] = []; 
    $mensagem = "Compra concluída com sucesso! Obrigado pela preferência 💖";
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Finalizar Compra - Maria Pink</title>
  <style>
body {
  font-family: Arial, sans-serif;
  background: #fffaf6;
  margin: 0;
  padding: 0;
}

header {
  background: #ffe1e7;
  padding: 20px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  border-bottom: 1px solid #f0dce3;
}

header .logo {
  font-size: 1.8em;
  font-weight: bold;
  color: #d6336c;
}

header nav a {
  margin-left: 20px;
  text-decoration: none;
  color: #d6336c;
  font-weight: 500;
}

header nav a:hover {
  color: #9e1f4d;
}

.container {
  max-width: 960px;
  margin: 40px auto;
  padding: 20px;
  background: white;
  border-radius: 10px;
  box-shadow: 0 2px 6px rgba(0,0,0,0.1);
}

h1 {
  text-align: center;
  color: #d6336c;
  margin-bottom: 20px;
}

table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 20px;
}

table th, table td {
  padding: 10px;
  border-bottom: 1px solid #eee;
  text-align: center;
}

table th {
  background: #ffe1e7;
  color: #d6336c;
}

.produto-img {
  width: 60px;
  height: auto;
  border-radius: 6px;
}

button, .btn {
  background: #d6336c;
  color: white;
  border: none;
  padding: 10px 20px;
  border-radius: 5px;
  cursor: pointer;
  text-decoration: none;
  font-size: 1em;
}

button:hover, .btn:hover {
  background: #9e1f4d;
}

.mensagem {
  text-align: center;
  padding: 20px;
  background: #e6ffe6;
  color: #008000;
  border: 1px solid #b3ffb3;
  border-radius: 8px;
  margin-bottom: 20px;
  font-weight: bold;
}
  </style>
</head>
<body>
  <header>
    <div class="logo">Maria Pink</div>
    <nav>
      <a href="../menu.php">Produtos</a>
      <a href="carrinho.php">Carrinho</a>
      <a href="../logout.php">Sair</a>
    </nav>
  </header>

  <div class="container">
    <h1>Finalizar Compra</h1>

    <?php if (isset($mensagem)): ?>
      <div class="mensagem"><?php echo $mensagem; ?></div>
      <p style="text-align:center;"><a href="../menu.php" class="btn">Voltar às compras</a></p>
    <?php elseif (empty($_SESSION['carrinho'])): ?>
      <p style="text-align:center;">Seu carrinho está vazio.</p>
      <p style="text-align:center;"><a href="../menu.php" class="btn">Voltar às compras</a></p>
    <?php else: ?>
      <table>
        <tr>
          <th>Imagem</th>
          <th>Produto</th>
          <th>Preço</th>
          <th>Quantidade</th>
          <th>Subtotal</th>
        </tr>
        <?php
        $total = 0;
        foreach ($_SESSION['carrinho'] as $id => $qtd):
            $p = $produtos[$id];
            $subtotal = $p['preco'] * $qtd;
            $total += $subtotal;
        ?>
        <tr>
          <td><img src="<?php echo $p['imagem']; ?>" alt="<?php echo $p['nome']; ?>" class="produto-img"></td>
          <td><?php echo $p['nome']; ?></td>
          <td>R$ <?php echo number_format($p['preco'], 2, ',', '.'); ?></td>
          <td><?php echo $qtd; ?></td>
          <td>R$ <?php echo number_format($subtotal, 2, ',', '.'); ?></td>
        </tr>
        <?php endforeach; ?>
        <tr>
          <th colspan="4" style="text-align:right;">Total:</th>
          <th>R$ <?php echo number_format($total, 2, ',', '.'); ?></th>
        </tr>
      </table>

      <form method="post" style="text-align:center;">
        <button type="submit" name="confirmar">Confirmar Compra</button>
      </form>
    <?php endif; ?>
  </div>
</body>
</html>
