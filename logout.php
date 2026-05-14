<?php
// Passo 1: Inicia (ou retoma) a sessão para ter acesso a $_SESSION.
session_start();

// Passo 2: Limpa todos os dados armazenados em $_SESSION.
session_unset();

// Passo 3: Destrói a sessão no servidor.
session_destroy();

// Passo 4: Redireciona o usuário para a página de login.
header('Location: /login.php');

// Passo 5: Para a execução. Sempre use exit() após header('Location:').
exit();