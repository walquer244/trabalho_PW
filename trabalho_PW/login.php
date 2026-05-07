<?php
session_start();

if (isset($_SESSION['usuario_id'])){
    header('location: /pages/cadastro/index.php');
    exit();
}
// require_once __DIR__ . '/config/database.php';
$erro = "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = trim($_POST['email'] ?? '');
    $senha = trim($_POST['senha'] ?? '');

    if(empty($email) || ($senha)) {
        $erro = 'Por favor, preencha o email e a senha';
    
    } else {
        $pdo = getConexao();
        $stmt = $pdo->prepare(
            "SELECT id, nome, email, FROM usuarios WHERE email = :email LIMIT 1");
        $stmt->execute([':email' => $email]);
        $usuario = $stmt->fetch();
        if($usuario && password_verify($senha, $usuario['senha'])) {
            $_SESSION['usuario_id'] = $usuario['id'];          
            $_SESSION['usuario_nome'] = $usuario['nome'];       
            $_SESSION['usuario_email'] = $usuario['email'];

            header('location: /pages/cadastro/index.php');
            exit();
       
        }else{
            $erro = 'E-mail ou senha invalidos. Tente novamente.';

        }  
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <form method="post">
        <label for = "email"> Digite seu email </label>
        <input type="email" id="email" name="email" required><br>
        
        <label for = "senha"> Digite sua senha </label>
        <input type="password" id="senha" name="senha" required><br>

        <input type="submit" value="Enviar">
    </form>
    
</body>
</html>