<?php
// ============================================================
// SEED.PHP - Configuração Inicial do Banco de Dados
// ============================================================
// Este arquivo cria o usuário administrador padrão do sistema.
//
// QUANDO USAR:
//   Execute UMA VEZ logo após rodar "docker compose up" pela primeira vez.
//   Acesse: http://localhost:8080/_setup/seed.php
//
// ⚠️  ATENÇÃO: Em um projeto real de produção, este tipo de arquivo
// deveria ser excluído após o uso. Nunca o deixe acessível publicamente!
// ============================================================

// Inclui a função de conexão com o banco
require_once __DIR__ . '/../config/database.php';

// Dados do usuário administrador que será criado
$nomeAdmin  = 'Administrador';
$emailAdmin = 'admin@exemplo.com';
$senhaAdmin = '123456';

// Variáveis para controlar o resultado da operação
$mensagem = '';
$sucesso  = false;

// Processa somente quando o botão do formulário for clicado (método POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Conecta ao banco de dados
    $pdo = getConexao();

    // Verifica se já existe um usuário com este e-mail.
    // Usamos Prepared Statement para segurança (evitar SQL Injection).
    $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email LIMIT 1");
    $stmt->execute([':email' => $emailAdmin]);
    $usuarioExistente = $stmt->fetch();

    if ($usuarioExistente) {
        // Usuário já foi criado anteriormente: informa e não duplica.
        $mensagem = "O usuário '{$emailAdmin}' já existe no banco de dados. O sistema já está configurado!";
        $sucesso  = true;

    } else {
        // Gera o hash seguro da senha usando o algoritmo bcrypt.
        //
        // O QUE É password_hash()?
        // É a função nativa do PHP para criar hashes de senha de forma segura.
        // Ela usa o algoritmo bcrypt (PASSWORD_DEFAULT) que:
        //   - Adiciona um "salt" aleatório automaticamente (impossível reverter)
        //   - É deliberadamente lento (dificulta ataques de força bruta)
        //   - Gera um hash diferente a cada chamada, mesmo para a mesma senha
        //
        // Nunca armazene senhas em texto puro! Sempre use password_hash()!
        $hashSenha = password_hash($senhaAdmin, PASSWORD_DEFAULT);

        // Insere o usuário no banco com o hash gerado acima.
        $stmt = $pdo->prepare(
            "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)"
        );

        $stmt->execute([
            ':nome'  => $nomeAdmin,
            ':email' => $emailAdmin,
            ':senha' => $hashSenha,  // Armazenamos o HASH, nunca a senha original!
        ]);

        $mensagem = "Usuário administrador criado com sucesso!";
        $sucesso  = true;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuração Inicial — AulaLogin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-lg">

        <!-- Cabeçalho -->
        <div class="text-center mb-6">
            <span class="text-5xl">⚙️</span>
            <h1 class="text-2xl font-bold text-gray-800 mt-3">Configuração Inicial</h1>
            <p class="text-gray-500 text-sm mt-1">Cria o usuário administrador no banco de dados</p>
        </div>

        <!-- Card principal -->
        <div class="bg-white rounded-2xl shadow-md p-8">

            <!-- Exibe mensagem de resultado após o envio do formulário -->
            <?php if ($mensagem): ?>
                <div class="<?= $sucesso ? 'bg-green-50 border-green-200 text-green-800' : 'bg-red-50 border-red-200 text-red-800' ?> border rounded-lg px-5 py-4 mb-6">
                    <p class="font-semibold text-sm"><?= $sucesso ? '✅ Pronto!' : '❌ Erro' ?></p>
                    <p class="text-sm mt-1"><?= htmlspecialchars($mensagem) ?></p>

                    <?php if ($sucesso): ?>
                        <div class="mt-4 pt-4 border-t border-green-200">
                            <p class="text-sm font-medium mb-2">Credenciais de acesso:</p>
                            <p class="text-sm">📧 E-mail: <strong><?= htmlspecialchars($emailAdmin) ?></strong></p>
                            <p class="text-sm">🔑 Senha: <strong><?= htmlspecialchars($senhaAdmin) ?></strong></p>
                            <a href="/login.php"
                               class="inline-block mt-4 bg-slate-800 text-white text-sm font-medium px-5 py-2 rounded-lg hover:bg-slate-700 transition">
                                Ir para o Login →
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <!-- Informações sobre o que será criado -->
            <?php if (!$sucesso): ?>
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6 text-sm text-blue-800">
                    <p class="font-semibold mb-2">O que este script faz:</p>
                    <ul class="space-y-1 list-disc list-inside text-blue-700">
                        <li>Cria o usuário <strong><?= htmlspecialchars($emailAdmin) ?></strong></li>
                        <li>Gera um hash seguro para a senha <strong><?= htmlspecialchars($senhaAdmin) ?></strong></li>
                        <li>Insere o registro na tabela <code class="bg-blue-100 px-1 rounded">usuarios</code></li>
                    </ul>
                </div>

                <!-- Formulário com botão de confirmação -->
                <form action="" method="post">
                    <button
                        type="submit"
                        class="w-full bg-slate-800 hover:bg-slate-700 text-white font-semibold py-3 rounded-lg transition text-sm"
                    >
                        ✅ Criar Usuário Administrador
                    </button>
                </form>
            <?php endif; ?>

        </div>

        <!-- Aviso de segurança -->
        <div class="mt-4 bg-amber-50 border border-amber-300 rounded-xl p-4">
            <p class="text-amber-800 text-xs font-semibold flex items-center gap-2">
                <span>⚠️</span> AVISO DE SEGURANÇA
            </p>
            <p class="text-amber-700 text-xs mt-1">
                Em um projeto real, este arquivo deveria ser deletado após o uso.
                Nunca deixe scripts de seed acessíveis em servidores de produção!
            </p>
        </div>

    </div>

</body>
</html>