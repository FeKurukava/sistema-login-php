// encerra a sessão
<?php
session_start();
session_destroy();

setcookie("carrinho", "", time() - 3600, "/");

header("Location: login.html");
exit;
?>