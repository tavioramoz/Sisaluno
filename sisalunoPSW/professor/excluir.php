<!DOCTYPE html>
<html>
<head>
  <title>Excluir Professor</title>
  <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
  <div class="caixa">
  <a class="voltar" href="index.php">Gerenciar professor</a>
      <h1>Excluir Professor</h1>
      <form method="post" action="excluir.php">
        <label for="id">ID do Professor:</label>
        <input type="number" id="id" name="id" placeholder="Digite o id do professor para confirma" required>
        <input type="submit" value="Excluir">
      </form>
  </div>
</body>
</html>

<?php

require_once "../conn.php";

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = $_POST["id"];

  // Prepara e executa a query para excluir o professor do banco de dados
  $stmt = $conn->prepare("DELETE FROM Professor WHERE id = :id");
  $stmt->bindParam(':id', $id);

  $stmt->execute();

  // Redireciona para a página principal de professores
  header("Location: index.php");
  exit();
}
?>
