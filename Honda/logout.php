<?php
require_once __DIR__ . '/config.php';

// Limpa todas as variáveis de sessão
$_SESSION = [];

// Destrói o cookie de sessão
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Destrói a sessão
session_destroy();

// Redireciona para o login
header("Location: " . BASE_URL . "login.php");
exit;
?>
