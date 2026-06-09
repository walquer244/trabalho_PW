<?php
require_once __DIR__ . '/../config.php';
check_admin();
$id = $_GET['id'] ?? null;
if ($id) {
    $id = (int)$id;
    
    if ($id === (int)$_SESSION['user_id']) {
        header("Location: list.php?error=" . urlencode("Você não pode excluir sua própria conta."));
        exit;
    }
    try {
        $stmt = $pdo->prepare("DELETE FROM usuarios WHERE id = :id");
        $stmt->execute(['id' => $id]);
        header("Location: list.php?success=" . urlencode("Usuário excluído com sucesso do sistema."));
        exit;
    } catch (PDOException $e) {
        header("Location: list.php?error=" . urlencode("Erro ao excluir usuário: " . $e->getMessage()));
        exit;
    }
} else {
    header("Location: list.php");
    exit;
}
?>
