<?php
// ============================================================
// carros/edit.php - Editar Carro
// ============================================================
require_once __DIR__ . '/../config.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id <= 0) {
    header("Location: list.php");
    exit;
}

// Busca o carro existente
try {
    $stmt = $pdo->prepare("SELECT * FROM carros WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $car = $stmt->fetch();
    if (!$car) {
        header("Location: list.php?error=" . urlencode("Carro não encontrado."));
        exit;
    }
} catch (PDOException $e) {
    die("Erro ao carregar carro: " . $e->getMessage());
}

$error = '';

// Processa o formulário de atualização
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $marca  = trim($_POST['marca']  ?? '');
    $modelo = trim($_POST['modelo'] ?? '');
    $cor    = trim($_POST['cor']    ?? '');
    $ano    = (int)($_POST['ano']   ?? 0);
    $valor  = str_replace(',', '.', trim($_POST['valor'] ?? ''));

    // Validações
    if (empty($marca) || empty($modelo) || empty($cor) || empty($ano) || !isset($_POST['valor'])) {
        $error = 'Por favor, preencha todos os campos obrigatórios.';
    } elseif ((float)$valor <= 0) {
        $error = 'O valor deve ser maior que zero.';
    } elseif ($ano < 1900 || $ano > (int)date('Y') + 1) {
        $error = 'Ano de fabricação inválido.';
    } else {
        try {
            $stmt = $pdo->prepare(
                "UPDATE carros SET marca = :marca, modelo = :modelo, cor = :cor, ano = :ano, valor = :valor WHERE id = :id"
            );
            $stmt->execute([
                'marca'  => $marca,
                'modelo' => $modelo,
                'cor'    => $cor,
                'ano'    => $ano,
                'valor'  => (float)$valor,
                'id'     => $id,
            ]);
            header("Location: list.php?success=" . urlencode("Carro atualizado com sucesso!"));
            exit;
        } catch (PDOException $e) {
            $error = "Erro ao atualizar: " . $e->getMessage();
        }
    }
}

require_once BASE_PATH . '/includes/header.php';
?>

<div class="space-y-6">

    <!-- Cabeçalho -->
    <div class="flex items-center justify-between pb-5 border-b border-slate-800/80">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-white">Editar Carro</h1>
            <p class="text-slate-400 text-sm mt-1">Atualize as informações do carro #<?php echo $id; ?></p>
        </div>
        <a href="list.php"
           class="inline-flex items-center bg-slate-800 hover:bg-slate-700 text-slate-300 font-semibold py-2.5 px-4 border border-slate-700 rounded-xl text-sm transition">
            ← Voltar
        </a>
    </div>

    <!-- Alerta de Erro -->
    <?php if (!empty($error)): ?>
        <div class="p-4 bg-rose-500/10 border border-rose-500/20 text-rose-400 text-sm rounded-2xl flex items-center space-x-2">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
            </svg>
            <span><?php echo htmlspecialchars($error); ?></span>
        </div>
    <?php endif; ?>

    <!-- Formulário de Edição -->
    <div class="max-w-2xl bg-slate-900/40 border border-slate-800/80 p-8 rounded-3xl shadow-xl">
        <form action="edit.php?id=<?php echo $id; ?>" method="POST" id="form-edit-carro-<?php echo $id; ?>" class="space-y-6">

            <!-- Marca e Modelo -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="marca" class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">
                        Marca <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="marca" id="marca" required
                           placeholder="Ex: Honda, Toyota, Fiat..."
                           value="<?php echo htmlspecialchars($_POST['marca'] ?? $car['marca']); ?>"
                           class="w-full bg-slate-950/60 border border-slate-800 hover:border-slate-700 focus:border-red-500 rounded-xl py-3 px-4 text-slate-200 placeholder-slate-600 focus:outline-none transition text-sm">
                </div>
                <div>
                    <label for="modelo" class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">
                        Modelo <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="modelo" id="modelo" required
                           placeholder="Ex: Civic, Corolla, Uno..."
                           value="<?php echo htmlspecialchars($_POST['modelo'] ?? $car['modelo']); ?>"
                           class="w-full bg-slate-950/60 border border-slate-800 hover:border-slate-700 focus:border-red-500 rounded-xl py-3 px-4 text-slate-200 placeholder-slate-600 focus:outline-none transition text-sm">
                </div>
            </div>

            <!-- Cor e Ano de Fabricação -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="cor" class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">
                        Cor <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="cor" id="cor" required
                           placeholder="Ex: Preto, Branco, Prata..."
                           value="<?php echo htmlspecialchars($_POST['cor'] ?? $car['cor']); ?>"
                           class="w-full bg-slate-950/60 border border-slate-800 hover:border-slate-700 focus:border-red-500 rounded-xl py-3 px-4 text-slate-200 placeholder-slate-600 focus:outline-none transition text-sm">
                </div>
                <div>
                    <label for="ano" class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">
                        Ano de Fabricação <span class="text-red-500">*</span>
                    </label>
                    <input type="number" name="ano" id="ano" required min="1900" max="<?php echo date('Y') + 1; ?>"
                           value="<?php echo htmlspecialchars($_POST['ano'] ?? $car['ano']); ?>"
                           class="w-full bg-slate-950/60 border border-slate-800 hover:border-slate-700 focus:border-red-500 rounded-xl py-3 px-4 text-slate-200 placeholder-slate-600 focus:outline-none transition text-sm">
                </div>
            </div>

            <!-- Valor -->
            <div>
                <label for="valor" class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">
                    Valor (R$) <span class="text-red-500">*</span>
                </label>
                <input type="number" step="0.01" name="valor" id="valor" required min="0.01"
                       value="<?php echo htmlspecialchars($_POST['valor'] ?? $car['valor']); ?>"
                       class="w-full bg-slate-950/60 border border-slate-800 hover:border-slate-700 focus:border-red-500 rounded-xl py-3 px-4 text-slate-200 placeholder-slate-600 focus:outline-none transition text-sm">
            </div>

            <!-- Botões -->
            <div class="flex items-center space-x-3 pt-4 border-t border-slate-800/80">
                <button type="submit" id="btn-atualizar-carro"
                        class="bg-red-600 hover:bg-red-700 active:bg-red-800 text-white font-semibold py-2.5 px-6 rounded-xl transition text-sm shadow-lg shadow-red-600/15">
                    Atualizar Carro
                </button>
                <a href="list.php"
                   class="bg-slate-800 hover:bg-slate-700 text-slate-300 font-semibold py-2.5 px-6 border border-slate-700 rounded-xl transition text-sm">
                    Cancelar
                </a>
            </div>

        </form>
    </div>
</div>

<?php require_once BASE_PATH . '/includes/footer.php'; ?>
