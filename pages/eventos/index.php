<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tipo de Eventos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="justify-center items-center">
        <form action="" method="post">
            <label for="evento">Qual Evento Deseja Adicionar?</label>
            <input type="text" id="evento" name="evento" required>
            <input type="submit" valeu="Adicionar">
        </form>
    </div>
    <?php
    $host = "localhost";
    $dbname = "steventos";
    $user = "root";
    $pass = "";

    $query = new PDO("mysql:host=$host,dbname=$dbname", $user, $pass);
    $query->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $eventos = trim($_POST['evento']);
    }

    $pdo = getConexao();
    $stmt = $pdo->prepare("SELECT id, nome FROM eventos WHERE eventos");
    $stmt->execute([':eventos' => $eventos]);
    $usuario = $stmt->fetch();
    ?>
</body>

</html>