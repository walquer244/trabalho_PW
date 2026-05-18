<?php 

include("../../config/db.php"); 
include("../../config/auth.php");

?>

<?php
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id <= 0) { header("Location: index.php"); exit; }

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $nome = $_POST['nome'] ?? '';
  $cor = $_POST['cor'] ?? '';
  $descricao = $_POST['descricao'] ?? '';

  $stmt = $conn->prepare("UPDATE categorias SET nome=?, cor=?, descricao=? WHERE id=?");
  $stmt->bind_param("sssi", $nome, $cor, $descricao, $id);
  $stmt->execute();
  $stmt->close();
  header("Location: index.php");
  exit;
}

$stmt = $conn->prepare("SELECT nome, cor, descricao FROM categorias WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$res = $stmt->get_result();
$cat = $res->fetch_assoc();
$stmt->close();
if (!$cat) { header("Location: index.php"); exit; }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Editar Categoria</title>
  <link href="../styles/tailwind.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6">
  <h1 class="text-2xl font-bold mb-4">Editar Categoria</h1>
  <form method="POST" class="space-y-4 max-w-lg">
    <input type="text" name="nome" value="<?= htmlspecialchars($cat['nome'], ENT_QUOTES, 'UTF-8') ?>" required class="border p-2 w-full rounded">
    <input type="text" name="cor" value="<?= htmlspecialchars($cat['cor'], ENT_QUOTES, 'UTF-8') ?>" class="border p-2 w-full rounded">
    <textarea name="descricao" class="border p-2 w-full rounded"><?= htmlspecialchars($cat['descricao'], ENT_QUOTES, 'UTF-8') ?></textarea>
    <div>
      <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Atualizar</button>
      <a href="index.php" class="ml-2 text-gray-600">Cancelar</a>
    </div>
  </form>
</body>
</html>
