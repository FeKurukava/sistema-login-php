<?php
setcookie("carrinho", "", time() - 3600, "/");
header("Location: ../sessoes/menu.php");
exit;
?>