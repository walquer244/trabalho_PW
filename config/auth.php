<?php
// config/auth.php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Forçar HTTPS em produção (opcional)
if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] !== 'on') {
    header('Location: https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    exit;
}

function require_admin() {
    if (empty($_SESSION['admin_logged']) || $_SESSION['admin_logged'] !== true) {
        header("Location: /event-manager/login.php");
        exit;
    }
}

function admin_email() {
    return $_SESSION['admin_email'] ?? null;
}
