<!-- Rename this file to "config.php" and put the real credentials below  -->

<?php
$dbname = "";
$host = "";
$dbuser = "";
$dbpass = "";
$dsn = "mysql:dbname=$dbname;host=$host";

try {
  $pdo = new PDO($dsn, $dbuser, $dbpass);
  // echo "conectado";
} catch (PDOException $e) {
  die('Erro: ' . $e->getMessage());
}
 ?>
