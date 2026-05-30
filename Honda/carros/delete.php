<?php
require_once __DIR__ . '/../config.php';
// Authentication check
check_login();
$id = $_GET['id'] ?? null;
if ($id) {
    $id = (int)$id;
    try {
        $stmt = $pdo->prepare("DELETE FROM carros WHERE id = :id");
        $stmt->execute(['id' => $id]);
        header("Location: list.php?success=" . urlencode("Carro excluído com sucesso do estoque."));
        exit;
    } catch (PDOException $e) {
        header("Location: list.php?error=" . urlencode("Erro ao excluir veículo: " . $e->getMessage()));
        exit;
    }
} else {
    header("Location: list.php");
    exit;
}
?>
