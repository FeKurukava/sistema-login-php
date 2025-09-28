<?php
session_start();
$erro = isset($_GET['erro']) ? $_GET['erro'] : 0;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Login - Maria Pink</title>
  <style>
body {
  font-family: Arial, sans-serif;
  background: linear-gradient(135deg, #ffe1e7, #fffaf6);
  height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0;
}

.container {
  background: #ffffff;
  padding: 40px;
  border-radius: 12px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
  width: 100%;
  max-width: 380px;
  text-align: center;
}

h1 {
  margin-bottom: 20px;
  color: #d6336c;
  font-size: 1.8em;
}

form {
  display: flex;
  flex-direction: column;
  gap: 15px;
}

input[type="text"],
input[type="password"] {
  padding: 12px;
  border: 1px solid #f3d9df;
  border-radius: 8px;
  outline: none;
  font-size: 1em;
  transition: border 0.2s;
}

input[type="text"]:focus,
input[type="password"]:focus {
  border-color: #d6336c;
}

button {
  background: #d6336c;
  color: white;
  border: none;
  padding: 12px;
  border-radius: 8px;
  cursor: pointer;
  font-size: 1em;
  transition: background 0.2s;
}

button:hover {
  background: #9e1f4d;
}

.error {
  color: red;
  margin-top: 10px;
  font-size: 0.9em;
}

footer {
  margin-top: 20px;
  font-size: 0.8em;
  color: #888;
}
  </style>
</head>
<body>
  <div class="container">
    <h1>Login</h1>
    <form action="logar.php" method="post">
      <input type="text" name="user" placeholder="Usuário" required>
      <input type="password" name="senha" placeholder="Senha" required>
      <button type="submit">Entrar</button>
    </form>
    <?php if ($erro == 1): ?>
      <div class="error">Usuário ou senha incorretos!</div>
    <?php endif; ?>
    <footer>&copy; 2025 Maria Pink</footer>
  </div>
</body>
</html>
