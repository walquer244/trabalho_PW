<?php
require_once 'config.php';
$success = false;
$message = "";
try {
    // 1. Read schema.sql
    $schemaFile = 'database/schema.sql';
    if (!file_exists($schemaFile)) {
        throw new Exception("Arquivo de schema não encontrado em: " . $schemaFile);
    }

    $sql = file_get_contents($schemaFile);

    // Execute schema creation
    $pdo->exec($sql);
    $message .= "Estrutura do banco de dados inicializada com sucesso!<br>";
    // Reset tables to clear pre-defined vehicles and employees for clean state
    $pdo->exec("TRUNCATE TABLE carros");
    $pdo->exec("TRUNCATE TABLE motos");
    $pdo->exec("TRUNCATE TABLE funcionarios");

    // Clear and re-seed only the users for system access
    $pdo->exec("TRUNCATE TABLE usuarios");
    $users = [
        ['nome' => 'Administrador Honda', 'email' => 'admin@honda.com.br', 'senha' => password_hash('admin123', PASSWORD_DEFAULT), 'nivel_acesso' => 'admin'],
        ['nome' => 'Felipe Vendedor', 'email' => 'vendedor@honda.com.br', 'senha' => password_hash('venda123', PASSWORD_DEFAULT), 'nivel_acesso' => 'funcionario']
    ];

    $stmtUser = $pdo->prepare("INSERT INTO usuarios (nome, email, senha, nivel_acesso) VALUES (:nome, :email, :senha, :nivel_acesso)");
    foreach ($users as $user) {
        $stmtUser->execute($user);
    }
    $message .= "Usuários administrativos criados com sucesso (admin@honda.com.br / admin123 e vendedor@honda.com.br / venda123).<br>";
    $message .= "Estoque de veículos e quadro de funcionários limpos para preenchimento manual.<br>";

    $success = true;
} catch (Exception $e) {
    $success = false;
    $message .= "Erro ao rodar setup: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instalação - Concessionária Honda</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-900 text-slate-100 min-h-screen flex items-center justify-center p-4">
    <div class="max-w-md w-full bg-slate-800 rounded-2xl shadow-xl border border-slate-700 p-8">
        <div class="flex items-center space-x-3 mb-6">
            <div class="w-12 h-12 rounded-xl bg-red-600 flex items-center justify-center text-white font-bold text-xl">H
            </div>
            <div>
                <h1 class="text-2xl font-bold tracking-tight">Honda Concessionária</h1>
                <p class="text-slate-400 text-sm font-medium">Instalador & Setup do Sistema</p>
            </div>
        </div>

        <div
            class="p-4 rounded-xl <?php echo $success ? 'bg-emerald-950/50 border border-emerald-500/30 text-emerald-300' : 'bg-rose-950/50 border border-rose-500/30 text-rose-300'; ?> mb-6 text-sm leading-relaxed">
            <?php echo $message; ?>
        </div>
        <?php if ($success): ?>
            <div class="space-y-4">
                <a href="index.php"
                    class="w-full block text-center bg-red-600 hover:bg-red-700 active:bg-red-800 text-white font-semibold py-3 px-4 rounded-xl transition duration-150 shadow-lg shadow-red-600/20">
                    Ir para o Login
                </a>
                <p class="text-xs text-center text-slate-400 leading-normal">
                    Credenciais padrão:<br>
                    <strong>admin@honda.com.br</strong> (senha: <code>admin123</code>)<br>
                    <strong>vendedor@honda.com.br</strong> (senha: <code>venda123</code>)
                </p>
            </div>
        <?php else: ?>
            <button onclick="window.location.reload();"
                class="w-full bg-slate-700 hover:bg-slate-600 active:bg-slate-800 text-white font-semibold py-3 px-4 rounded-xl transition duration-150">
                Tentar Novamente
            </button>
        <?php endif; ?>
    </div>
</body>

</html>