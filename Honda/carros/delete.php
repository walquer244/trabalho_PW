<?php
require_once __DIR__ . '/../config.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id <= 0) {
    header("Location: list.php");
    exit;
}

try {
    $stmt = $pdo->prepare("DELETE FROM carros WHERE id = :id");
    $stmt->execute(['id' => $id]);
    header("Location: list.php?success=" . urlencode("Carro excluído com sucesso."));
    exit;
} catch (PDOException $e) {
    header("Location: list.php?error=" . urlencode("Erro ao excluir: " . $e->getMessage()));
    exit;
}
?>
