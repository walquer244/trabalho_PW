<?php 

include("../../config/db.php"); 
include("../../config/auth.php");

?>
<?php
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id > 0) {
  $stmt = $conn->prepare("DELETE FROM categorias WHERE id=?");
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $stmt->close();
}
header("Location: index.php");
exit;
?>
