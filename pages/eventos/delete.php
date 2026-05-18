<?php 

include("../../config/db.php"); 
include("../../config/auth.php");

?>

<?php
$id = $_GET['id'];
$conn->query("DELETE FROM eventos WHERE id=$id");
header("Location: index.php");
?>
