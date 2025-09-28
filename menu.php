<?php
session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit;
}


include __DIR__ . "/sessoes/produtos.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Maria Pink</title>
  <style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: Arial, sans-serif;
  background: #fffaf6;
  color: #333;
  line-height: 1.6;
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
  transition: color 0.2s;
}

header nav a:hover {
  color: #9e1f4d;
}

.container {
  max-width: 960px;
  margin: 40px auto;
  padding: 0 20px;
}

h1 {
  margin-bottom: 20px;
  color: #d6336c;
  text-align: center;
}

.produtos-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
  gap: 20px;
}

.produto-card {
  background: #ffffff;
  border: 1px solid #f3d9df;
  border-radius: 12px;
  overflow: hidden;
  text-align: center;
  box-shadow: 0 2px 5px rgba(0,0,0,0.05);
  transition: transform 0.2s, box-shadow 0.2s;
}

.produto-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

.produto-card img {
  width: 100%;
  height: auto;
}

.produto-card .info {
  padding: 15px;
}

.produto-card .info h3 {
  font-size: 1.2em;
  color: #d6336c;
  margin-bottom: 10px;
}

.produto-card .info p {
  font-size: 0.9em;
  color: #666;
  margin-bottom: 15px;
}

.produto-card button {
  background: #d6336c;
  color: white;
  border: none;
  padding: 10px 20px;
  border-radius: 5px;
  cursor: pointer;
  font-size: 1em;
  transition: background 0.2s;
}

.produto-card button:hover {
  background: #9e1f4d;
}

footer {
  text-align: center;
  padding: 30px 0;
  margin-top: 40px;
  color: #aaa;
  font-size: 0.9em;
}
  </style>
</head>
<body>
  <header>
    <div class="logo">Maria Pink</div>
    <nav>
      <a href="sessoes/produtos.php">Produtos</a>
      <a href="sessoes/carrinho.php">Carrinho</a>
      <a href="logout.php">Sair</a>
    </nav>
  </header>

  <div class="container">
    <h1>Escolha seus perfumes</h1>
    <div class="produtos-grid">
      <?php foreach ($produtos as $id => $p): ?>
        <div class="produto-card">
          <img src="<?php echo $p['imagem']; ?>" alt="<?php echo $p['nome']; ?>">
          <div class="info">
            <h3><?php echo $p['nome']; ?></h3>
            <p>Preço: R$ <?php echo number_format($p['preco'], 2, ',', '.'); ?></p>
            <form method="post" action="sessoes/carrinho.php">
              <input type="hidden" name="produto_id" value="<?php echo $id; ?>">
              <button type="submit">Adicionar ao carrinho</button>
            </form>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <footer>
    &copy; 2025 Loja de Perfumes. Todos os direitos reservados.
  </footer>
</body>
</html>
