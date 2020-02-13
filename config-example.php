<!-- Rename this file to "config.php" and put the real credentials below  -->

<?php
$dbname = "";
$host = "";
$dbuser = "";
$dbpass = "";
$dsn = "mysql:dbname=$dbname;host=$host";
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]; // Essas opções mostram mais detalhadamente os erros quando eles aparecerem

try {
  $pdo = new PDO($dsn, $dbuser, $dbpass, $options);
  // echo "conectado";
} catch (PDOException $e) {
  die('Erro: ' . $e->getMessage());
}
 ?>
