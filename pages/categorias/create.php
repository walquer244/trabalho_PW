<?php 

include("../../config/db.php"); 
include("../../config/auth.php");

require_admin();

?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = $_POST['nome'];
  $cor = $_POST['cor'];
  $descricao = $_POST['descricao'];

  $sql = "INSERT INTO categorias (nome, cor, descricao) VALUES ('$nome', '$cor', '$descricao')";
  $conn->query($sql);
  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Nova Categoria</title>
  <link href="../styles/tailwind.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6">
  <h1 class="text-2xl font-bold mb-4">Criar Categoria</h1>
  <form method="POST" class="space-y-4">
    <input type="text" name="nome" placeholder="Nome" class="border p-2 w-full">
    <input type="text" name="cor" placeholder="Cor" class="border p-2 w-full">
    <textarea name="descricao" placeholder="Descrição" class="border p-2 w-full"></textarea>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Salvar</button>
  </form>
</body>
</html>
