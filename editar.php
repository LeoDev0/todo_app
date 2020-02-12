<link rel="stylesheet" href="css/styles.css">

<?php
require_once "config.php";

// Pegando o id na url para saber qual o conteúdo atual do todo que será alterado
if (isset($_GET['id']) && !empty($_GET['id'])) {
  $id = $_GET['id'];

  $sql = "SELECT * FROM todos WHERE id = :id";
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(":id", $id);
  $stmt->execute();

  if ($stmt->rowCount() > 0) {
    $todo = $stmt->fetch();
  } else {
    header("Location: index.php");
  }
} else {
  header("Location: index.php");
}


// Pegando novo valor para o todo digitado pelo usuário e atualizando no banco de dados
if (isset($_POST['todo']) && !empty($_POST['todo'])) {
  $id = $_GET['id'];
  $todoAlterado = $_POST['todo'];

  $sql = "UPDATE todos SET todo = :todoAlterado WHERE id = :id";
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(":id", $id);
  $stmt->bindValue(":todoAlterado", $todoAlterado);
  $stmt->execute();

  header("Location: index.php");
}
 ?>

<a href="index.php">↩️  Voltar</a>
<br><br><br>

<div class="container">
  <form method="post">
    <br>
    <input type="text" name="todo" placeholder="Editar Todo" value="<?= $todo['todo'] ?>"> <!-- O atual valor do todo é renderizado no input -->
    <button class="btn submit">Salvar</button>
  </form>
</div>
