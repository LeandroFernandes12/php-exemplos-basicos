<?php
// Página de logout (15c_logout.php)
session_start();

session_destroy(); // Destroi(finaliza) a sessão do usuário

// Redireciona forçando um novo login
header("Location: 15a_sistema.php");
exit();
?>