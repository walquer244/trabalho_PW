<?php
require_once __DIR__ . '/../config.php';
require_once BASE_PATH . '/includes/header.php';
check_admin();
$error = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome']);
    $funcao = trim($_POST['funcao']);
    $data_admissao = $_POST['data_admissao'];
    $data_nascimento = $_POST['data_nascimento'];
    $salario = (float)$_POST['salario'];
    if (empty($nome) || empty($funcao) || empty($data_admissao) || empty($data_nascimento) || !isset($_POST['salario'])) {
        $error = "Por favor, preencha todos os campos obrigatórios.";
    } elseif ($salario <= 0) {
        $error = "O salário deve ser um valor maior que zero.";
    } elseif (strtotime($data_admissao) < strtotime($data_nascimento)) {
        $error = "A data de admissão não pode ser anterior à data de nascimento.";
    } else {
        try {
            $stmt = $pdo->prepare("INSERT INTO funcionarios (nome, funcao, data_admissao, data_nascimento, salario) VALUES (:nome, :funcao, :data_admissao, :data_nascimento, :salario)");
            $stmt->execute([
                'nome' => $nome,
                'funcao' => $funcao,
                'data_admissao' => $data_admissao,
                'data_nascimento' => $data_nascimento,
                'salario' => $salario
            ]);
            header("Location: list.php?success=" . urlencode("Funcionário cadastrado com sucesso."));
            exit;
        } catch (PDOException $e) {
            $error = "Erro ao cadastrar funcionário: " . $e->getMessage();
        }
    }
}
?>
<div class="space-y-6">
    <div class="flex items-center justify-between pb-5 border-b border-slate-800/80">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-white font-sans">Contratar Funcionário</h1>
            <p class="text-slate-400 text-sm mt-1">Registre um novo colaborador no sistema administrativo</p>
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
        <form action="create.php" method="POST" class="space-y-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="nome" class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">Nome Completo</label>
                    <input type="text" name="nome" id="nome" required placeholder="Amanda Ribeiro Costa"
                           value="<?php echo isset($_POST['nome']) ? htmlspecialchars($_POST['nome']) : ''; ?>"
                           class="w-full bg-slate-950/60 border border-slate-800 hover:border-slate-700 focus:border-red-500 rounded-xl py-2.5 px-4 text-slate-200 placeholder-slate-600 focus:outline-none transition text-sm">
                </div>
                <div>
                    <label for="funcao" class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">Função / Cargo</label>
                    <input type="text" name="funcao" id="funcao" required placeholder="Vendedora Senior, Auxiliar Administrativa..."
                           value="<?php echo isset($_POST['funcao']) ? htmlspecialchars($_POST['funcao']) : ''; ?>"
                           class="w-full bg-slate-950/60 border border-slate-800 hover:border-slate-700 focus:border-red-500 rounded-xl py-2.5 px-4 text-slate-200 placeholder-slate-600 focus:outline-none transition text-sm">
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <div>
                    <label for="data_admissao" class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">Data de Admissão</label>
                    <input type="date" name="data_admissao" id="data_admissao" required
                           value="<?php echo isset($_POST['data_admissao']) ? htmlspecialchars($_POST['data_admissao']) : date('Y-m-d'); ?>"
                           class="w-full bg-slate-950/60 border border-slate-800 hover:border-slate-700 focus:border-red-500 rounded-xl py-2.5 px-4 text-slate-200 focus:outline-none transition text-sm text-slate-400">
                </div>
                <div>
                    <label for="data_nascimento" class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">Data de Nascimento</label>
                    <input type="date" name="data_nascimento" id="data_nascimento" required
                           value="<?php echo isset($_POST['data_nascimento']) ? htmlspecialchars($_POST['data_nascimento']) : '1995-01-01'; ?>"
                           class="w-full bg-slate-950/60 border border-slate-800 hover:border-slate-700 focus:border-red-500 rounded-xl py-2.5 px-4 text-slate-200 focus:outline-none transition text-sm text-slate-400">
                </div>
                <div>
                    <label for="salario" class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">Salário Mensal (R$)</label>
                    <input type="number" step="0.01" name="salario" id="salario" required placeholder="3200.00"
                           value="<?php echo isset($_POST['salario']) ? htmlspecialchars($_POST['salario']) : ''; ?>"
                           class="w-full bg-slate-950/60 border border-slate-800 hover:border-slate-700 focus:border-red-500 rounded-xl py-2.5 px-4 text-slate-200 placeholder-slate-600 focus:outline-none transition text-sm">
                </div>
            </div>
            <div class="flex items-center space-x-4 pt-4 border-t border-slate-800/80">
                <button type="submit" class="bg-red-600 hover:bg-red-700 active:bg-red-800 text-white font-semibold py-2.5 px-6 rounded-xl transition text-sm shadow-lg shadow-red-600/15">
                    Confirmar Contratação
                </button>
                <a href="list.php" class="bg-slate-800 hover:bg-slate-700 text-slate-300 font-semibold py-2.5 px-6 border border-slate-700 rounded-xl transition text-sm">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
<?php require_once BASE_PATH . '/includes/footer.php'; ?>
