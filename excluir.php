<?php
require_once "config.php";

// Pega o id do todo clicado, deleta ele do banco de dados e volta imediatamente para o index.php
if (isset($_GET['id']) && !empty($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "DELETE FROM todos WHERE id = :id";
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(":id", $id);
  $stmt->execute();

  header("Location: index.php");
} else {
  header("Location: index.php");
}
 ?>
