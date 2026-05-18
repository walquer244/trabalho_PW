<?php 

include("../../config/db.php"); 
include("../../config/auth.php");

require_admin();

?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $titulo = $_POST['titulo'];
  $data = $_POST['data'];
  $local = $_POST['local'];
  $descricao = $_POST['descricao'];

  $sql = "INSERT INTO eventos (titulo, data, local, descricao) VALUES ('$titulo', '$data', '$local', '$descricao')";
  $conn->query($sql);
  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Novo Evento</title>
  <link href="../styles/tailwind.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6">
  <h1 class="text-2xl font-bold mb-4">Criar Evento</h1>
  <form method="POST" class="space-y-4">
    <input type="text" name="titulo" placeholder="Título" class="border p-2 w-full">
    <input type="date" name="data" class="border p-2 w-full">
    <input type="text" name="local" placeholder="Local" class="border p-2 w-full">
    <textarea name="descricao" placeholder="Descrição" class="border p-2 w-full"></textarea>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Salvar</button>
  </form>
</body>
</html>
