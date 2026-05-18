<?php 

include("../../config/db.php"); 
include("../../config/auth.php");


$id = $_GET['id'];
$result = $conn->query("SELECT * FROM eventos WHERE id=$id");
$evento = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $titulo = $_POST['titulo'];
  $data = $_POST['data'];
  $local = $_POST['local'];
  $descricao = $_POST['descricao'];

  $sql = "UPDATE eventos SET titulo='$titulo', data='$data', local='$local', descricao='$descricao' WHERE id=$id";
  $conn->query($sql);
  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Editar Evento</title>
  <link href="../styles/tailwind.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6">
  <h1 class="text-2xl font-bold mb-4">Editar Evento</h1>
  <form method="POST" class="space-y-4">
    <input type="text" name="titulo" value="<?= $evento['titulo'] ?>" class="border p-2 w-full">
    <input type="date" name="data" value="<?= $evento['data'] ?>" class="border p-2 w-full">
    <input type="text" name="local" value="<?= $evento['local'] ?>" class="border p-2 w-full">
    <textarea name="descricao" class="border p-2 w-full"><?= $evento['descricao'] ?></textarea>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Atualizar</button>
  </form>
</body>
</html>
