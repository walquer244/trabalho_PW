<?php 

include("../../config/db.php");
include("../../config/auth.php");

require_admin(); 

?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $telefone = $_POST['telefone'];

  $sql = "INSERT INTO participantes (nome, email, telefone) VALUES ('$nome', '$email', '$telefone')";
  $conn->query($sql);
  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Novo Participante</title>
  <link href="../styles/tailwind.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6">
  <h1 class="text-2xl font-bold mb-4">Criar Participante</h1>
  <form method="POST" class="space-y-4">
    <input type="text" name="nome" placeholder="Nome" class="border p-2 w-full">
    <input type="email" name="email" placeholder="Email" class="border p-2 w-full">
    <input type="text" name="telefone" placeholder="Telefone" class="border p-2 w-full">
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Salvar</button>
  </form>
</body>
</html>
