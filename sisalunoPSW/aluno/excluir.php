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
        <label for="name">Nome do Aluno:</label>
        <input type="text" name="nome" placeholder="Digite o nome do aluno para comfirma" required>
        <input type="submit" value="Excluir">
      </form>
  </div>
</body>
</html>

<?php

require_once "../conn.php";

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = $_POST["nome"];

  // Prepara e executa a query para excluir o aluno do banco de dados
  $stmt = $conn->prepare("DELETE FROM Aluno WHERE nome = :nome");
  $stmt->bindParam(':nome', $nome);

  $stmt->execute();

  // Redireciona para a página principal de alunos
  header("Location: index.php");
  exit();
}
?>

