<?php
// Database connection configuration

// Configuration with Docker support
define('DB_HOST', getenv('DB_HOST') ?: '127.0.0.1');
define('DB_USER', getenv('DB_USER') ?: 'root');
define('DB_PASS', getenv('DB_PASS') !== false ? getenv('DB_PASS') : '');
define('DB_NAME', getenv('DB_NAME') ?: 'honda_dealership');
// Define physical base path on disk
define('BASE_PATH', str_replace('\\', '/', __DIR__));
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Dynamically compute browser BASE_URL
$scriptName = $_SERVER['SCRIPT_NAME'] ?? '';
$docRoot = str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT'] ?? '');
$projectDir = str_replace('\\', '/', __DIR__);
if (!empty($docRoot)) {
    // If running via standard webserver with document root
    $subfolder = str_replace($docRoot, '', $projectDir);
    $baseUrl = '/' . ltrim($subfolder, '/');
    $baseUrl = rtrim($baseUrl, '/') . '/';
} else {
    // CLI fallback
    $baseUrl = '/';
}
define('BASE_URL', $baseUrl);
try {
    // Connect to MySQL (first without database name, to verify/create it if necessary in setup.php)
    // Connect to MySQL
    $dsn = "mysql:host=" . DB_HOST . ";charset=utf8mb4";
    $pdo = new PDO($dsn, DB_USER, DB_PASS, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ]);
    // Create database if not exists and select it
    $pdo->exec("CREATE DATABASE IF NOT EXISTS " . DB_NAME . " CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    $pdo->exec("USE " . DB_NAME);
} catch (PDOException $e) {
    // Clean display for connection errors
    die("Erro de conexão com o banco de dados: " . $e->getMessage());
}
// Function to check if user is logged in
function check_login() {
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        header("Location: " . BASE_URL . "login.php");
        exit;
    }
}
// Function to check if user has admin access
function check_admin() {
    check_login();
    if ($_SESSION['user_level'] !== 'admin') {
        header("Location: index.php?error=unauthorized");
        header("Location: " . BASE_URL . "index.php?error=unauthorized");
        exit;
    }
}
// Helper to format currency (BRL - R$)
function format_currency($val) {
    return 'R$ ' . number_format($val, 2, ',', '.');
}
// Helper to format dates
function format_date($date) {
    return date('d/m/Y', strtotime($date));
}
// Helper to format mileage
function format_km($km) {
    return number_format($km, 0, ',', '.') . ' km';
}
?>
