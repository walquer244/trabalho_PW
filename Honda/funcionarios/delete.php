<?php
require_once __DIR__ . '/../config.php';
// Authentication check
check_admin();
$id = $_GET['id'] ?? null;
if ($id) {
    $id = (int)$id;
    try {
        $stmt = $pdo->prepare("DELETE FROM funcionarios WHERE id = :id");
        $stmt->execute(['id' => $id]);
        header("Location: list.php?success=" . urlencode("Funcionário excluído com sucesso do quadro de pessoal."));
        exit;
    } catch (PDOException $e) {
        header("Location: list.php?error=" . urlencode("Erro ao desligar funcionário: " . $e->getMessage()));
        exit;
    }
} else {
    header("Location: list.php");
    exit;
}
?>
