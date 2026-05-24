<?php 
include("../config/db.php"); 
include("../config/conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Eventos</title>
  <link href="../styles/tailwind.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6">
  <h1 class="text-3xl font-bold text-blue-600 mb-4">Lista de Eventos</h1>
  <a href="create.php" class="bg-green-500 text-white px-4 py-2 rounded">Novo Evento</a>

  <div class="mt-4">
    <?php
    $result = $conn->query("SELECT * FROM eventos");
    while($row = $result->fetch_assoc()) {
      echo "
      <div class='bg-white shadow p-4 rounded mb-2'>
        <h2 class='text-xl font-semibold'>{$row['titulo']}</h2>
        <p>{$row['local']} - {$row['data']}</p>
        <a href='edit.php?id={$row['id']}' class='bg-yellow-500 text-white px-2 py-1 rounded'>Editar</a>
        <a href='delete.php?id={$row['id']}' class='bg-red-500 text-white px-2 py-1 rounded'>Excluir</a>
      </div>";
    }
    ?>
  </div>