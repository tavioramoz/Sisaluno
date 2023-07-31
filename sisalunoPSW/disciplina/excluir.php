<!DOCTYPE html>
<html>
<head>
  <title>Excluir Disciplina</title>
  <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
  <div class="caixa">
  <a class="voltar" href="index.php">Gerenciar diciplina</a>
      <h1>Excluir Disciplina</h1>
      <form method="post" action="excluir.php">
        <label for="nome">Nome da Disciplina:</label>
        <input type="text" name="nome" placeholder="Digite o nome da diciplina para comfirma" required>
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

  // Prepara e executa a query para excluir a disciplina do banco de dados
  $stmt = $conn->prepare("DELETE FROM Disciplina WHERE nome = :nome");
  $stmt->bindParam(':nome', $nome);

  $stmt->execute();

  // Redireciona para a página principal de disciplinas
  header("Location: index.php");
  exit();
}
?>
