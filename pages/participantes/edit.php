<?php 

include("../../config/db.php"); 
include("../../config/auth.php");



$id = $_GET['id'];
$result = $conn->query("SELECT * FROM participantes WHERE id=$id");
$participante = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $telefone = $_POST['telefone'];

  $sql = "UPDATE participantes SET nome='$nome', email='$email', telefone='$telefone' WHERE id=$id";
  $conn->query($sql);
  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Editar Participante</title>
  <link href="../styles/tailwind.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6">
  <h1 class="text-2xl font-bold mb-4">Editar Participante</h1>
  <form method="POST" class="space-y-4">
    <input type="text" name="nome" value="<?= $participante['nome'] ?>" class="border p-2 w-full">
    <input type="email" name="email" value="<?= $participante['email'] ?>" class="border p-2 w-full">
    <input type="text" name="telefone" value="<?= $participante['telefone'] ?>" class="border p-2 w-full">
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Atualizar</button>
  </form>
</body>
</html>
