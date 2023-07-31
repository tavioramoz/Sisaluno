<!DOCTYPE html>
<html>
<head>
  <title>Inserir Professor</title>
  <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
  <div class="caixa">
  <a class="voltar" href="index.php">Gerenciar professor</a>
      <h1>Cadastrar Professor</h1>
      <form method="post" action="inserir.php">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" maxlength= "100" required>
        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" maxlength= "11"required>
        <label for="idade">Idade:</label>
        <input type="number" id="idade" name="idade" maxlength= "100" required>
        <label for="datanascimento">Data de Nascimento:</label>
        <input type="date" id="datanascimento" name="datanascimento" maxlength= "10" required>
        <label for="endereco">Endereço:</label>
        <input type="text" id="endereco" name="endereco" maxlength= "100" required>
        <select name="status" id="status" required>
          <option value="At">Ativo</option>
          <option value="NT">Não ativo</option>
        </select>
        <input type="submit" value="Inserir">
      </form>
  </div>
</body>
</html>

<?php

require_once "../conn.php";

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = $_POST["nome"];
  $cpf = $_POST["cpf"];
  $idade = $_POST["idade"];
  $datanascimento = $_POST["datanascimento"];
  $endereco = $_POST["endereco"];
  $status = $_POST["status"];

  // Prepara e executa a query para inserir o professor no banco de dados
  $stmt = $conn->prepare("INSERT INTO Professor (nome, cpf, idade, datanascimento, endereco, estatus) VALUES (:nome, :cpf, :idade, :datanascimento, :endereco, :status)");
  $stmt->bindParam(':nome', $nome);
  $stmt->bindParam(':cpf', $cpf);
  $stmt->bindParam(':idade', $idade);
  $stmt->bindParam(':datanascimento', $datanascimento);
  $stmt->bindParam(':endereco', $endereco);
  $stmt->bindParam(':status', $status);

  $stmt->execute();

  // Redireciona para a página principal de professores
  header("Location: index.php");
  exit();
}
?>
