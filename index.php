<!-- Importando arquivo de conexão com o banco de dados e o template
do cabeçalho do HTML  -->
<?php
require_once "config.php";
include "templates/header.php";
?>

<!-- Ícones do FontAwesome -->
<script defer src="https://kit.fontawesome.com/6497846d4f.js" crossorigin="anonymous"></script>

<!-- Campo para adicionar o nodo Todo -->
<form method="post">
  <br>
  <input type="text" name="todo" placeholder="Adicionar Todo">
  <button class="btn submit">Adicionar</button>
</form>
<br><br>

<?php
// Renderizando os Todos já existentes na página
$sql = "SELECT * FROM todos ORDER BY id DESC";  // exibir os todos em ordem inversa de  criação (do mais novo, pro mais velho)
$stmt = $pdo->query($sql)->fetchAll();

if (count($stmt) > 0) {
  echo "<ul>";
  foreach ($stmt as $todo) {
    echo '<li>';
      echo '<div class="task">';
        echo $todo['todo'];
      echo '</div>';
      echo '<div class="actions">';
        echo '<a class="btn delete" href="excluir.php?id=' . $todo['id'] . '"> <i class="far fa-trash-alt"></i> </a>  ';
        echo '<a class="btn edit" href="editar.php?id=' . $todo['id'] . '"> <i class="far fa-edit"></i> </a>';
      echo '</div>';
    echo '</li>';
    echo '<br />';
    echo '<br />';
  }
  echo "</ul>";
} else {
  echo "Ainda não há todos!";
}

// Checando se o campo de adicionar todo está preenchido, caso esteja
// o novo todo será adicionado ao banco quando apertado o botão "Adicionar"
if (isset($_POST['todo']) && !empty($_POST['todo'])) {
  $sql = "INSERT INTO todos VALUES (null, :todo)";

  $todo = $_POST['todo'];

  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(":todo", $todo);
  $stmt->execute();

  header("Location: index.php");
}

// Importando o arquivo de emplate da parte final do HTML (rodapé da página)
include "templates/footer.php";
 ?>
