<?php
require_once __DIR__ . 'header.php';
// Fetch statistics
try {
    // Counts
    $numCarros = $pdo->query("SELECT COUNT(*) FROM carros")->fetchColumn();
    $numMotos = $pdo->query("SELECT COUNT(*) FROM motos")->fetchColumn();
    $numFuncionarios = $pdo->query("SELECT COUNT(*) FROM funcionarios")->fetchColumn();
    $numUsuarios = $pdo->query("SELECT COUNT(*) FROM usuarios")->fetchColumn();
    // Financial calculations
    $valCarros = $pdo->query("SELECT SUM(valor) FROM carros")->fetchColumn() ?: 0.0;
    $valMotos = $pdo->query("SELECT SUM(valor) FROM motos")->fetchColumn() ?: 0.0;
    $valTotalEstoque = $valCarros + $valMotos;
    $mediaSalario = $pdo->query("SELECT AVG(salario) FROM funcionarios")->fetchColumn() ?: 0.0;
    // Recent Additions
    $recentCars = $pdo->query("SELECT * FROM carros ORDER BY id DESC LIMIT 3")->fetchAll();
    $recentMotos = $pdo->query("SELECT * FROM motos ORDER BY id DESC LIMIT 3")->fetchAll();
} catch (PDOException $e) {
    die("Erro ao carregar dados do painel: " . $e->getMessage());
}
?>
<div class="space-y-8">
    <!-- Welcome Header Banner -->
    <div class="relative bg-gradient-to-r from-red-900/40 via-red-950/20 to-slate-900/60 p-8 rounded-3xl border border-red-500/10 overflow-hidden">
        <div class="absolute right-0 top-0 h-full w-1/3 opacity-10 pointer-events-none bg-contain bg-right bg-no-repeat" style="background-image: url('https://images.unsplash.com/photo-1542282088-fe8426682b8f?auto=format&fit=crop&q=80&w=600')"></div>
        <div class="relative z-10 max-w-2xl">
            <h2 class="text-3xl font-extrabold tracking-tight text-white mb-2">Olá, <?php echo htmlspecialchars($userName); ?>!</h2>
            <h2 class="text-3xl font-extrabold tracking-tight text-white mb-2 font-sans">Olá, <?php echo htmlspecialchars($userName); ?>!</h2>
            <p class="text-slate-300 text-sm md:text-base leading-relaxed">
                Bem-vindo ao painel da concessionária Honda. Aqui você pode gerenciar de forma rápida o inventário de carros e motocicletas, visualizar informações de funcionários e gerenciar usuários cadastrados.
            </p>
        </div>
    </div>
    <!-- Stats Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Card 1: Carros -->
        <div class="bg-slate-900/60 backdrop-blur-md border border-slate-800 hover:border-slate-700/80 rounded-2xl p-6 transition duration-200">
            <div class="flex items-center justify-between mb-4">
                <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Total de Carros</span>
                <div class="p-2.5 bg-blue-500/10 text-blue-400 rounded-xl">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
            <div class="flex items-baseline space-x-2">
                <span class="text-3xl font-bold tracking-tight text-white"><?php echo $numCarros; ?></span>
                <span class="text-xs text-slate-500 font-medium">veículos</span>
            </div>
            <p class="text-xs text-slate-400 mt-2">Valor de estoque: <span class="font-semibold text-slate-300"><?php echo format_currency($valCarros); ?></span></p>
        </div>
        <!-- Card 2: Motos -->
        <div class="bg-slate-900/60 backdrop-blur-md border border-slate-800 hover:border-slate-700/80 rounded-2xl p-6 transition duration-200">
            <div class="flex items-center justify-between mb-4">
                <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Total de Motos</span>
                <div class="p-2.5 bg-amber-500/10 text-amber-400 rounded-xl">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
            </div>
            <div class="flex items-baseline space-x-2">
                <span class="text-3xl font-bold tracking-tight text-white"><?php echo $numMotos; ?></span>
                <span class="text-xs text-slate-500 font-medium">unidades</span>
            </div>
            <p class="text-xs text-slate-400 mt-2">Valor de estoque: <span class="font-semibold text-slate-300"><?php echo format_currency($valMotos); ?></span></p>
        </div>
        <!-- Card 3: Valor Total Estoque -->
        <div class="bg-slate-900/60 backdrop-blur-md border border-slate-800 hover:border-slate-700/80 rounded-2xl p-6 transition duration-200">
            <div class="flex items-center justify-between mb-4">
                <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Estoque Consolidado</span>
                <div class="p-2.5 bg-emerald-500/10 text-emerald-400 rounded-xl">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                    </svg>
                </div>
            </div>
            <div class="flex items-baseline space-x-1">
                <span class="text-2xl font-extrabold tracking-tight text-white truncate"><?php echo format_currency($valTotalEstoque); ?></span>
            </div>
            <p class="text-xs text-slate-400 mt-2">Soma de carros e motocicletas</p>
        </div>
        <!-- Card 4: Funcionários / Usuários -->
        <!-- Card 4: Recursos Humanos -->
        <div class="bg-slate-900/60 backdrop-blur-md border border-slate-800 hover:border-slate-700/80 rounded-2xl p-6 transition duration-200">
            <div class="flex items-center justify-between mb-4">
                <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Recursos Humanos</span>
                <div class="p-2.5 bg-purple-500/10 text-purple-400 rounded-xl">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </div>
            </div>
            <div class="flex items-baseline space-x-2">
                <span class="text-3xl font-bold tracking-tight text-white"><?php echo $numFuncionarios; ?></span>
                <span class="text-xs text-slate-500 font-medium">colaboradores</span>
            </div>
            <p class="text-xs text-slate-400 mt-2"><span class="font-semibold text-slate-300"><?php echo $numUsuarios; ?></span> usuários logáveis</p>
        </div>
    </div>
    <!-- Lists Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Recent Cars -->
        <div class="bg-slate-900/40 border border-slate-800/80 rounded-3xl p-6">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h3 class="text-lg font-bold text-white">Carros Recentes</h3>
                    <p class="text-xs text-slate-400">Últimos veículos adicionados</p>
                </div>
                <a href="carros.php" class="text-xs font-semibold text-red-400 hover:text-red-300 transition-colors flex items-center">
                <a href="<?php echo BASE_URL; ?>carros/list.php" class="text-xs font-semibold text-red-400 hover:text-red-300 transition-colors flex items-center">
                    Ver todos
                    <svg class="w-3.5 h-3.5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
            <div class="space-y-4">
                <?php if (count($recentCars) > 0): ?>
                    <?php foreach ($recentCars as $car): ?>
                        <div class="flex items-center justify-between p-4 bg-slate-900/80 border border-slate-800/80 rounded-2xl hover:border-slate-700 transition">
                            <div class="flex items-center space-x-3.5 min-w-0">
                                <div class="w-12 h-12 rounded-xl bg-slate-950 flex-shrink-0 flex items-center justify-center text-slate-600 font-bold overflow-hidden border border-slate-800">
                                    <?php if (!empty($car['imagem_url'])): ?>
                                        <img src="<?php echo htmlspecialchars($car['imagem_url']); ?>" alt="Foto" class="w-full h-full object-cover">
                                    <?php else: ?>
                                        🚗
                                    <?php endif; ?>
                                </div>
                                <div class="min-w-0">
                                    <h4 class="text-sm font-bold text-slate-200 truncate"><?php echo htmlspecialchars($car['marca'] . ' ' . $car['modelo']); ?></h4>
                                    <p class="text-xs text-slate-400 mt-0.5">Ano <?php echo $car['ano']; ?> • <?php echo format_km($car['quilometragem']); ?></p>
                                </div>
                            </div>
                            <span class="text-sm font-bold text-red-400 flex-shrink-0 ml-4"><?php echo format_currency($car['valor']); ?></span>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-sm text-slate-500 py-6 text-center">Nenhum carro cadastrado.</p>
                    <p class="text-sm text-slate-500 py-6 text-center">Nenhum carro cadastrado no momento.</p>
                <?php endif; ?>
            </div>
        </div>
        <!-- Recent Motos -->
        <div class="bg-slate-900/40 border border-slate-800/80 rounded-3xl p-6">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h3 class="text-lg font-bold text-white">Motos Recentes</h3>
                    <p class="text-xs text-slate-400">Últimas motocicletas adicionadas</p>
                </div>
                <a href="motos.php" class="text-xs font-semibold text-red-400 hover:text-red-300 transition-colors flex items-center">
                <a href="<?php echo BASE_URL; ?>motos/list.php" class="text-xs font-semibold text-red-400 hover:text-red-300 transition-colors flex items-center">
                    Ver todos
                    <svg class="w-3.5 h-3.5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
            <div class="space-y-4">
                <?php if (count($recentMotos) > 0): ?>
                    <?php foreach ($recentMotos as $moto): ?>
                        <div class="flex items-center justify-between p-4 bg-slate-900/80 border border-slate-800/80 rounded-2xl hover:border-slate-700 transition">
                            <div class="flex items-center space-x-3.5 min-w-0">
                                <div class="w-12 h-12 rounded-xl bg-slate-950 flex-shrink-0 flex items-center justify-center text-slate-600 font-bold overflow-hidden border border-slate-800">
                                    <?php if (!empty($moto['imagem_url'])): ?>
                                        <img src="<?php echo htmlspecialchars($moto['imagem_url']); ?>" alt="Foto" class="w-full h-full object-cover">
                                    <?php else: ?>
                                        🏍️
                                    <?php endif; ?>
                                </div>
                                <div class="min-w-0">
                                    <h4 class="text-sm font-bold text-slate-200 truncate"><?php echo htmlspecialchars($moto['marca'] . ' ' . $moto['modelo']); ?></h4>
                                    <p class="text-xs text-slate-400 mt-0.5">Ano <?php echo $moto['ano']; ?> • <?php echo format_km($moto['quilometragem']); ?></p>
                                </div>
                            </div>
                            <span class="text-sm font-bold text-red-400 flex-shrink-0 ml-4"><?php echo format_currency($moto['valor']); ?></span>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-sm text-slate-500 py-6 text-center">Nenhuma moto cadastrada.</p>
                    <p class="text-sm text-slate-500 py-6 text-center">Nenhuma moto cadastrada no momento.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php require_once 'includes/footer.php'; ?>
