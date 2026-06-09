<?php
require_once __DIR__ . '/../config.php';
require_once BASE_PATH . '/includes/header.php';
check_admin();
$error = "";
$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: list.php");
    exit;
}
try {
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $user = $stmt->fetch();
    if (!$user) {
        header("Location: list.php");
        exit;
    }
} catch (PDOException $e) {
    die("Erro ao buscar dados do usuário: " . $e->getMessage());
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $nivel_acesso = $_POST['nivel_acesso'];
    $senha = trim($_POST['senha']);
    if (empty($nome) || empty($email)) {
        $error = "Nome e e-mail são obrigatórios.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "E-mail inválido.";
    } else {
        try {
            $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email AND id != :id");
            $stmt->execute(['email' => $email, 'id' => $id]);
            if ($stmt->fetch()) {
                $error = "E-mail já está sendo utilizado por outro usuário.";
            } else {
                if (!empty($senha)) {
                    $hash = password_hash($senha, PASSWORD_DEFAULT);
                    $stmtUpdate = $pdo->prepare("UPDATE usuarios SET nome = :nome, email = :email, senha = :senha, nivel_acesso = :nivel_acesso WHERE id = :id");
                    $stmtUpdate->execute([
                        'nome' => $nome,
                        'email' => $email,
                        'senha' => $hash,
                        'nivel_acesso' => $nivel_acesso,
                        'id' => $id
                    ]);
                } else {
                    $stmtUpdate = $pdo->prepare("UPDATE usuarios SET nome = :nome, email = :email, nivel_acesso = :nivel_acesso WHERE id = :id");
                    $stmtUpdate->execute([
                        'nome' => $nome,
                        'email' => $email,
                        'nivel_acesso' => $nivel_acesso,
                        'id' => $id
                    ]);
                }
                
                if ($id === (int)$_SESSION['user_id']) {
                    $_SESSION['user_name'] = $nome;
                    $_SESSION['user_email'] = $email;
                    $_SESSION['user_level'] = $nivel_acesso;
                }
                
                header("Location: list.php?success=" . urlencode("Usuário atualizado com sucesso."));
                exit;
            }
        } catch (PDOException $e) {
            $error = "Erro ao atualizar usuário: " . $e->getMessage();
        }
    }
}
?>
<div class="space-y-6">
    <div class="flex items-center justify-between pb-5 border-b border-slate-800/80">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-white font-sans">Editar Usuário</h1>
            <p class="text-slate-400 text-sm mt-1">Atualize os privilégios e dados de acesso da conta</p>
        </div>
        <a href="list.php" class="flex items-center justify-center bg-slate-800 hover:bg-slate-700 active:bg-slate-900 text-slate-300 font-semibold py-2.5 px-4 border border-slate-700 rounded-xl text-sm transition">
            Voltar para Lista
        </a>
    </div>
    <?php if (!empty($error)): ?>
        <div class="p-4 bg-rose-500/10 border border-rose-500/20 text-rose-400 text-sm rounded-2xl flex items-center space-x-2">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
            </svg>
            <span><?php echo htmlspecialchars($error); ?></span>
        </div>
    <?php endif; ?>
    <div class="max-w-2xl bg-slate-900/40 border border-slate-800/80 p-8 rounded-3xl shadow-xl">
        <form action="edit.php?id=<?php echo $id; ?>" method="POST" class="space-y-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="nome" class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">Nome Completo</label>
                    <input type="text" name="nome" id="nome" required
                           value="<?php echo htmlspecialchars($_POST['nome'] ?? $user['nome']); ?>"
                           class="w-full bg-slate-950/60 border border-slate-800 hover:border-slate-700 focus:border-red-500 rounded-xl py-2.5 px-4 text-slate-200 placeholder-slate-600 focus:outline-none transition text-sm">
                </div>
                <div>
                    <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">E-mail Corporativo</label>
                    <input type="email" name="email" id="email" required
                           value="<?php echo htmlspecialchars($_POST['email'] ?? $user['email']); ?>"
                           class="w-full bg-slate-950/60 border border-slate-800 hover:border-slate-700 focus:border-red-500 rounded-xl py-2.5 px-4 text-slate-200 placeholder-slate-600 focus:outline-none transition text-sm">
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="senha" class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">Senha <span class="text-slate-500 normal-case">(deixe em branco para não alterar)</span></label>
                    <input type="password" name="senha" id="senha" placeholder="Alterar senha..."
                           class="w-full bg-slate-950/60 border border-slate-800 hover:border-slate-700 focus:border-red-500 rounded-xl py-2.5 px-4 text-slate-200 placeholder-slate-600 focus:outline-none transition text-sm">
                </div>
                <div>
                    <label for="nivel_acesso" class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">Nível de Acesso</label>
                    <select name="nivel_acesso" id="nivel_acesso"
                            class="w-full bg-slate-950/60 border border-slate-800 hover:border-slate-700 focus:border-red-500 rounded-xl py-2.5 px-4 text-slate-200 focus:outline-none transition text-sm">
                        <option value="funcionario" <?php echo ($user['nivel_acesso'] === 'funcionario') ? 'selected' : ''; ?>>Funcionário</option>
                        <option value="admin" <?php echo ($user['nivel_acesso'] === 'admin') ? 'selected' : ''; ?>>Administrador</option>
                    </select>
                </div>
            </div>
            <div class="flex items-center space-x-4 pt-4 border-t border-slate-800/80">
                <button type="submit" class="bg-red-600 hover:bg-red-700 active:bg-red-800 text-white font-semibold py-2.5 px-6 rounded-xl transition text-sm shadow-lg shadow-red-600/15">
                    Atualizar Usuário
                </button>
                <a href="list.php" class="bg-slate-800 hover:bg-slate-700 text-slate-300 font-semibold py-2.5 px-6 border border-slate-700 rounded-xl transition text-sm">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
<?php require_once BASE_PATH . '/includes/footer.php'; ?>
