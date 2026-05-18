<?php
// config/create_admin.php
include("db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($senha) < 6) {
        $error = "Email inválido ou senha muito curta (mín 6 caracteres).";
    } else {
        $hash = password_hash($senha, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO admins (email, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $email, $hash);
        if ($stmt->execute()) {
            $success = "Admin criado com sucesso. Remova este arquivo por segurança.";
        } else {
            $error = "Erro ao criar admin: " . $conn->error;
        }
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <title>Criar Admin</title>
  <link href="../styles/tailwind.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6">
  <div class="max-w-md mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-xl font-bold mb-4">Criar usuário Admin</h1>

    <?php if (!empty($error)): ?>
      <div class="bg-red-100 text-red-700 p-2 rounded mb-3"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <?php if (!empty($success)): ?>
      <div class="bg-green-100 text-green-700 p-2 rounded mb-3"><?= htmlspecialchars($success) ?></div>
    <?php endif; ?>

    <form method="POST" class="space-y-3">
      <input type="email" name="email" placeholder="Email do admin" required class="border p-2 w-full rounded">
      <input type="password" name="senha" placeholder="Senha (mín 6)" required class="border p-2 w-full rounded">
      <div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Criar</button>
      </div>
    </form>
    <p class="text-xs text-gray-500 mt-3">Remova este arquivo após criar o admin.</p>
  </div>
</body>
</html>
