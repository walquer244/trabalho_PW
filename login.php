<?php

// include("../config/db.php"); 
// include("../config/auth.php");

session_start();

if (isset($_SESSION['usuario_id'])) {
    header('location: /pages/cadastro/index.php');
    exit();
}
// require_once __DIR__ . '/config/conexao.php';
$erro = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email'] ?? '');
    $senha = trim($_POST['senha'] ?? '');

    if (empty($email) || ($senha)) {
        $erro = 'Por favor, preencha o email e a senha';

    } else {
        $pdo = getConexao();
        $stmt = $pdo->prepare(
            "SELECT id, nome, email, FROM usuarios WHERE email = :email LIMIT 1"
        );
        $stmt->execute([':email' => $email]);
        $usuario = $stmt->fetch();
        if ($usuario && password_verify($senha, $usuario['senha'])) {
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nome'] = $usuario['nome'];
            $_SESSION['usuario_email'] = $usuario['email'];

            header('location: /pages/cadastro/index.php');
            exit();

        } else {
            $erro = 'E-mail ou senha invalidos. Tente novamente.';

        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body
    class="min-h-screen flex items-center justify-center p-4 bg-[url('https://faculdadereboucas.com.br/wp-content/uploads/2018/08/aditya-chinchure-494048-unsplash.jpg')] bg-cover bg-center">
</body>

<div class="w-full max-w-md">

    <div class="backdrop-blur-sm bg-white/30 p-6 rounded-lg rounded-lg text-center mb-8 p-8">
        <span class="text-6xl">🎆</span>
        <h1 class="text-3xl font-bold text-gray- mt-4 tracking-tight">Sistema de Eventos</h1>
    </div>

    <div class="backdrop-blur-sm bg-white/30 p-6 rounded-lg  rounded-2xl shadow-2xl p-8">
        

        <h2 class="text-gray-800 text-xl font-semibold text-center mb-6">Acesse sua conta</h2>

        
        <?php if ($erro): ?>
            <div
                class="bg-red-50 border border-red-200 text-red-700 rounded-lg px-4 py-3 mb-5 text-sm flex items-start gap-2">
                <span class="mt-0.5">⚠️</span>
                <span><?= htmlspecialchars($erro) ?></span>
            </div>
        <?php endif; ?>

       
        <form action="pagina1.php" method="post" class="space-y-5" novalidate>

            
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1.5">E-mail</label>
                <input type="email" id="email" name="email" required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-slate-500 focus:border-transparent transition text-sm">
            </div>

            <div>
                <label for="senha" class="block text-sm font-medium text-gray-700 mb-1.5">Senha</label>
                <input type="password" id="senha" name="senha" required
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-slate-500 focus:border-transparent transition text-sm">
            </div>

            <button type="submit"
                class="w-full bg-slate-800 hover:bg-slate-700 active:bg-slate-900 text-white font-semibold py-3 rounded-lg transition duration-150 mt-2 focus:outline-none focus:ring-2 focus:ring-slate-500 focus:ring-offset-2 text-sm">
                Entrar no Sistema</button>

        </form>
    </div>

   
    <!-- <div class="bg-white border-transparent rounded-lg">
        <p class="text-center text-slate-500 text-xs mt-6">Primeiro acesso? Execute
            <a href="/_setup/seed.php" class="text-slate-300 hover:text-blue underline transition">_setup/seed.php</a>
            para criar o usuário administrador.
        </p>
    </div> -->

</div>

</body>

</html>