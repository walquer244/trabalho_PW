<?php
$activePage = basename($_SERVER['PHP_SELF']);
$uri = $_SERVER['REQUEST_URI'] ?? '';
$isDashboard = (basename($_SERVER['PHP_SELF']) === 'index.php');
$isCarros = (strpos($uri, '/carros/') !== false);
$isMotos = (strpos($uri, '/motos/') !== false);
$isFuncionarios = (strpos($uri, '/funcionarios/') !== false);
$isUsuarios = (strpos($uri, '/usuarios/') !== false);
$userLevel = $_SESSION['user_level'] ?? 'funcionario';
?>
<!-- Sidebar -->
<aside class="w-64 bg-slate-900 border-r border-slate-800/80 flex flex-col flex-shrink-0 h-full">
    <!-- Brand / Logo -->
    <div class="h-16 flex items-center px-6 border-b border-slate-800/80 bg-slate-900/40">
        <a href="index.php" class="flex items-center space-x-3">
        <a href="<?php echo BASE_URL; ?>index.php" class="flex items-center space-x-3">
            <div class="w-8 h-8 rounded-lg bg-red-600 flex items-center justify-center text-white font-bold text-lg shadow-md shadow-red-600/30">H</div>
            <span class="text-lg font-bold tracking-tight bg-gradient-to-r from-white via-slate-100 to-slate-400 bg-clip-text text-transparent">
                Honda Dealer
            </span>
        </a>
    </div>
    <!-- Navigation Items -->
    <nav class="flex-1 px-4 py-6 space-y-1.5 overflow-y-auto">
        <p class="px-3 text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Principal</p>
        
        <!-- Dashboard -->
        <a href="index.php" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-xl transition duration-150 <?php echo $activePage === 'index.php' ? 'bg-red-600/10 text-red-500 border border-red-500/20' : 'text-slate-400 hover:bg-slate-800/50 hover:text-slate-200 border border-transparent'; ?>">
        <a href="<?php echo BASE_URL; ?>index.php" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-xl transition duration-150 <?php echo $isDashboard ? 'bg-red-600/10 text-red-500 border border-red-500/20' : 'text-slate-400 hover:bg-slate-800/50 hover:text-slate-200 border border-transparent'; ?>">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
            </svg>
            Dashboard
        </a>
        <p class="px-3 text-xs font-semibold text-slate-500 uppercase tracking-wider mt-6 mb-2">Inventário</p>
        <!-- Carros -->
        <a href="carros.php" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-xl transition duration-150 <?php echo $activePage === 'carros.php' ? 'bg-red-600/10 text-red-500 border border-red-500/20' : 'text-slate-400 hover:bg-slate-800/50 hover:text-slate-200 border border-transparent'; ?>">
            <!-- Car Icon -->
        <a href="<?php echo BASE_URL; ?>carros/list.php" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-xl transition duration-150 <?php echo $isCarros ? 'bg-red-600/10 text-red-500 border border-red-500/20' : 'text-slate-400 hover:bg-slate-800/50 hover:text-slate-200 border border-transparent'; ?>">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            Carros
        </a>
        <!-- Motos -->
        <a href="motos.php" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-xl transition duration-150 <?php echo $activePage === 'motos.php' ? 'bg-red-600/10 text-red-500 border border-red-500/20' : 'text-slate-400 hover:bg-slate-800/50 hover:text-slate-200 border border-transparent'; ?>">
            <!-- Moto Icon (using customized map path for bike style or generic) -->
        <a href="<?php echo BASE_URL; ?>motos/list.php" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-xl transition duration-150 <?php echo $isMotos ? 'bg-red-600/10 text-red-500 border border-red-500/20' : 'text-slate-400 hover:bg-slate-800/50 hover:text-slate-200 border border-transparent'; ?>">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
            </svg>
            Motos
        </a>
        <?php if ($userLevel === 'admin'): ?>
            <p class="px-3 text-xs font-semibold text-slate-500 uppercase tracking-wider mt-6 mb-2">Administração</p>
            <!-- Funcionários -->
            <a href="funcionarios.php" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-xl transition duration-150 <?php echo $activePage === 'funcionarios.php' ? 'bg-red-600/10 text-red-500 border border-red-500/20' : 'text-slate-400 hover:bg-slate-800/50 hover:text-slate-200 border border-transparent'; ?>">
            <a href="<?php echo BASE_URL; ?>funcionarios/list.php" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-xl transition duration-150 <?php echo $isFuncionarios ? 'bg-red-600/10 text-red-500 border border-red-500/20' : 'text-slate-400 hover:bg-slate-800/50 hover:text-slate-200 border border-transparent'; ?>">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
                Funcionários
            </a>
            <!-- Usuários -->
            <a href="usuarios.php" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-xl transition duration-150 <?php echo $activePage === 'usuarios.php' ? 'bg-red-600/10 text-red-500 border border-red-500/20' : 'text-slate-400 hover:bg-slate-800/50 hover:text-slate-200 border border-transparent'; ?>">
            <a href="<?php echo BASE_URL; ?>usuarios/list.php" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-xl transition duration-150 <?php echo $isUsuarios ? 'bg-red-600/10 text-red-500 border border-red-500/20' : 'text-slate-400 hover:bg-slate-800/50 hover:text-slate-200 border border-transparent'; ?>">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
                Usuários
            </a>
        <?php endif; ?>
    </nav>
    <!-- Sidebar Footer -->
    <div class="p-4 border-t border-slate-800/80 bg-slate-950/40">
        <a href="logout.php" class="flex items-center justify-center w-full px-4 py-2.5 text-sm font-semibold text-rose-500 bg-rose-950/20 border border-rose-500/10 rounded-xl hover:bg-rose-950/40 hover:border-rose-500/25 transition-all">
        <a href="<?php echo BASE_URL; ?>logout.php" class="flex items-center justify-center w-full px-4 py-2.5 text-sm font-semibold text-rose-500 bg-rose-950/20 border border-rose-500/10 rounded-xl hover:bg-rose-950/40 hover:border-rose-500/25 transition-all">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
            </svg>
            Terminar Sessão
        </a>
    </div>
</aside>
