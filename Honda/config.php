<?php
// ============================================================
// config.php - Configuração Central do Sistema Honda
// ============================================================

// Configuração do banco de dados (suporte a variáveis de ambiente Docker)
define('DB_HOST', getenv('DB_HOST') ?: '127.0.0.1');
define('DB_USER', getenv('DB_USER') ?: 'root');
define('DB_PASS', getenv('DB_PASS') ?: '');
define('DB_NAME', getenv('DB_NAME') ?: 'honda_dealership');

// Caminho físico da raiz do projeto
define('BASE_PATH', str_replace('\\', '/', __DIR__));

// Iniciar sessão se ainda não estiver iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Calcular BASE_URL dinamicamente
$docRoot   = str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT'] ?? '');
$projectDir = str_replace('\\', '/', __DIR__);
if (!empty($docRoot) && strpos($projectDir, $docRoot) === 0) {
    $subfolder = str_replace($docRoot, '', $projectDir);
    $baseUrl   = '/' . ltrim($subfolder, '/');
    $baseUrl   = rtrim($baseUrl, '/') . '/';
} else {
    $baseUrl = '/';
}
define('BASE_URL', $baseUrl);

// Conexão com o banco de dados via PDO
try {
    $pdo = new PDO(
        "mysql:host=" . DB_HOST . ";charset=utf8mb4",
        DB_USER,
        DB_PASS,
        [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ]
    );
    // Criar banco se não existir e selecionar
    $pdo->exec("CREATE DATABASE IF NOT EXISTS `" . DB_NAME . "` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    $pdo->exec("USE `" . DB_NAME . "`");
} catch (PDOException $e) {
    die("<h2 style='color:red;font-family:sans-serif;'>Erro de conexão com o banco de dados:</h2><pre>" . $e->getMessage() . "</pre>");
}

// ============================================================
// Funções auxiliares de formatação
// ============================================================

/**
 * Formata um valor monetário em Real Brasileiro
 */
function format_currency(float $val): string {
    return 'R$ ' . number_format($val, 2, ',', '.');
}

/**
 * Formata uma data do formato Y-m-d para d/m/Y
 */
function format_date(string $date): string {
    if (empty($date) || $date === '0000-00-00') return '-';
    return date('d/m/Y', strtotime($date));
}

/**
 * Formata quilometragem com separador de milhar
 */
function format_km(int $km): string {
    return number_format($km, 0, ',', '.') . ' km';
}

// ============================================================
// Funções de controle de acesso (autenticação por sessão)
// ============================================================

/**
 * Verifica se o usuário está logado; redireciona para login se não
 */
function check_login(): void {
    if (empty($_SESSION['user_id'])) {
        header("Location: " . BASE_URL . "login.php");
        exit;
    }
}

/**
 * Verifica se o usuário é admin; redireciona se não for
 */
function check_admin(): void {
    check_login();
    if (($_SESSION['user_level'] ?? '') !== 'admin') {
        header("Location: " . BASE_URL . "index.php?error=acesso_negado");
        exit;
    }
}
?>
