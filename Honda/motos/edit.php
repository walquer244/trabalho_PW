<?php
require_once __DIR__ . '/../config.php';
require_once BASE_PATH . '/includes/header.php';
$error = "";
$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: list.php");
    exit;
}
try {
    $stmt = $pdo->prepare("SELECT * FROM motos WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $moto = $stmt->fetch();
    if (!$moto) {
        header("Location: list.php");
        exit;
    }
} catch (PDOException $e) {
    die("Erro ao carregar dados da moto: " . $e->getMessage());
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $marca = trim($_POST['marca']);
    $modelo = trim($_POST['modelo']);
    $ano = (int)$_POST['ano'];
    $quilometragem = (int)$_POST['quilometragem'];
    $valor = (float)$_POST['valor'];
    $cor = trim($_POST['cor']);
    $imagem_url = trim($_POST['imagem_url']);
    if (empty($marca) || empty($modelo) || empty($ano) || empty($cor) || !isset($_POST['valor'])) {
        $error = "Por favor, preencha todos os campos obrigatórios.";
    } elseif ($ano < 1900 || $ano > date('Y') + 1) {
        $error = "Ano de fabricação inválido.";
    } elseif ($quilometragem < 0) {
        $error = "A quilometragem não pode ser negativa.";
    } elseif ($valor <= 0) {
        $error = "O valor deve ser maior que zero.";
    } else {
        if (empty($imagem_url)) {
            $imagem_url = "https://images.unsplash.com/photo-1568772585407-9361f9bf3a87?auto=format&fit=crop&q=80&w=600";
        }
        try {
            $stmt = $pdo->prepare("UPDATE motos SET marca = :marca, modelo = :modelo, ano = :ano, quilometragem = :quilometragem, valor = :valor, cor = :cor, imagem_url = :imagem_url WHERE id = :id");
            $stmt->execute([
                'marca' => $marca,
                'modelo' => $modelo,
                'ano' => $ano,
                'quilometragem' => $quilometragem,
                'valor' => $valor,
                'cor' => $cor,
                'imagem_url' => $imagem_url,
                'id' => $id
            ]);
            header("Location: list.php?success=" . urlencode("Moto atualizada com sucesso."));
            exit;
        } catch (PDOException $e) {
            $error = "Erro ao atualizar motocicleta: " . $e->getMessage();
        }
    }
}
?>
<div class="space-y-6">
    <div class="flex items-center justify-between pb-5 border-b border-slate-800/80">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-white font-sans">Editar Moto</h1>
            <p class="text-slate-400 text-sm mt-1">Atualize as informações do veículo no inventário</p>
        </div>
        <a href="list.php" class="flex items-center justify-center bg-slate-800 hover:bg-slate-700 active:bg-slate-900 text-slate-300 font-semibold py-2.5 px-4 border border-slate-700 rounded-xl text-sm transition">
            Voltar para Estoque
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
                    <label for="marca" class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">Marca</label>
                    <select name="marca" id="marca" required
                            class="w-full bg-slate-950/60 border border-slate-800 hover:border-slate-700 focus:border-red-500 rounded-xl py-2.5 px-4 text-slate-200 focus:outline-none transition text-sm">
                        <option value="Honda" <?php echo $moto['marca'] === 'Honda' ? 'selected' : ''; ?>>Honda</option>
                        <option value="Kawasaki" <?php echo $moto['marca'] === 'Kawasaki' ? 'selected' : ''; ?>>Kawasaki</option>
                        <option value="Suzuki" <?php echo $moto['marca'] === 'Suzuki' ? 'selected' : ''; ?>>Suzuki</option>
                        <option value="Yamaha" <?php echo $moto['marca'] === 'Yamaha' ? 'selected' : ''; ?>>Yamaha</option>
                        <option value="BMW" <?php echo $moto['marca'] === 'BMW' ? 'selected' : ''; ?>>BMW</option>
                        <option value="Triumph" <?php echo $moto['marca'] === 'Triumph' ? 'selected' : ''; ?>>Triumph</option>
                        <option value="Ducati" <?php echo $moto['marca'] === 'Ducati' ? 'selected' : ''; ?>>Ducati</option>
                    </select>
                </div>
                <div>
                    <label for="modelo" class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">Modelo</label>
                    <input type="text" name="modelo" id="modelo" required placeholder="CB 500F"
                           value="<?php echo htmlspecialchars($_POST['modelo'] ?? $moto['modelo']); ?>"
                           class="w-full bg-slate-950/60 border border-slate-800 hover:border-slate-700 focus:border-red-500 rounded-xl py-2.5 px-4 text-slate-200 placeholder-slate-600 focus:outline-none transition text-sm">
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <div>
                    <label for="ano" class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">Ano de Fabricação</label>
                    <input type="number" name="ano" id="ano" required min="1900" max="<?php echo date('Y') + 1; ?>"
                           value="<?php echo htmlspecialchars($_POST['ano'] ?? $moto['ano']); ?>"
                           class="w-full bg-slate-950/60 border border-slate-800 hover:border-slate-700 focus:border-red-500 rounded-xl py-2.5 px-4 text-slate-200 placeholder-slate-600 focus:outline-none transition text-sm">
                </div>
                <div>
                    <label for="quilometragem" class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">Quilometragem (km)</label>
                    <input type="number" name="quilometragem" id="quilometragem" required min="0"
                           value="<?php echo htmlspecialchars($_POST['quilometragem'] ?? $moto['quilometragem']); ?>"
                           class="w-full bg-slate-950/60 border border-slate-800 hover:border-slate-700 focus:border-red-500 rounded-xl py-2.5 px-4 text-slate-200 placeholder-slate-600 focus:outline-none transition text-sm">
                </div>
                <div>
                    <label for="cor" class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">Cor</label>
                    <input type="text" name="cor" id="cor" required placeholder="Vermelho Sunset"
                           value="<?php echo htmlspecialchars($_POST['cor'] ?? $moto['cor']); ?>"
                           class="w-full bg-slate-950/60 border border-slate-800 hover:border-slate-700 focus:border-red-500 rounded-xl py-2.5 px-4 text-slate-200 placeholder-slate-600 focus:outline-none transition text-sm">
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="valor" class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">Preço de Venda (R$)</label>
                    <input type="number" step="0.01" name="valor" id="valor" required placeholder="39900.00"
                           value="<?php echo htmlspecialchars($_POST['valor'] ?? $moto['valor']); ?>"
                           class="w-full bg-slate-950/60 border border-slate-800 hover:border-slate-700 focus:border-red-500 rounded-xl py-2.5 px-4 text-slate-200 placeholder-slate-600 focus:outline-none transition text-sm">
                </div>
                <div>
                    <label for="imagem_url" class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">Link da Imagem (Opcional)</label>
                    <input type="url" name="imagem_url" id="imagem_url" placeholder="https://..."
                           value="<?php echo htmlspecialchars($_POST['imagem_url'] ?? $moto['imagem_url']); ?>"
                           class="w-full bg-slate-950/60 border border-slate-800 hover:border-slate-700 focus:border-red-500 rounded-xl py-2.5 px-4 text-slate-200 placeholder-slate-600 focus:outline-none transition text-sm">
                </div>
            </div>
            <div class="flex items-center space-x-4 pt-4 border-t border-slate-800/80">
                <button type="submit" class="bg-red-600 hover:bg-red-700 active:bg-red-800 text-white font-semibold py-2.5 px-6 rounded-xl transition text-sm shadow-lg shadow-red-600/15">
                    Atualizar Moto
                </button>
                <a href="list.php" class="bg-slate-800 hover:bg-slate-700 text-slate-300 font-semibold py-2.5 px-6 border border-slate-700 rounded-xl transition text-sm">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
<?php require_once BASE_PATH . '/includes/footer.php'; ?>