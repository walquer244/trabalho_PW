<?php
$host = "localhost";
$dbname = "steventos";
$user = "root";
$pass = "";

$conn = new mysqli($host, $dbname, $user, $pass);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}
?>
