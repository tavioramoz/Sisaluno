<!DOCTYPE html>
<html>
<head>
  <title>Excluir Aluno</title>
  <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
  <div class="caixa">
  <a class="voltar" href="index.php">Gerenciar Aluno</a>
      <h1>Excluir Aluno</h1>
      <form method="post" action="excluir.php">
        <label for="id">ID do Aluno:</label>
        <input type="number" id="id" name="id" placeholder="Digite o id do aluno para comfirma" required>
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

  // Prepara e executa a query para excluir o aluno do banco de dados
  $stmt = $conn->prepare("DELETE FROM Aluno WHERE id = :id");
  $stmt->bindParam(':id', $id);

  $stmt->execute();

  // Redireciona para a página principal de alunos
  header("Location: index.php");
  exit();
}
?>

