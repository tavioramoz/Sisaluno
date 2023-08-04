<!DOCTYPE html>
<html>
<head>
  <title>Excluir Disciplina</title>
  <style>
  
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #61ffff;
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  

  h1 {
    color: #3E3D3C;
  }
  
  a {
    color: #131314;
    text-decoration: none;
  }
  
  ul {
    list-style-type: none;
    padding: 0;
  }
  
  li {
    margin-bottom: 10px;
  }
  
  input[type="text"],
  input[type="number"],
  input[type="date"],
  select {
    padding: 10px;
    width: 100%;
    margin-bottom: 10px;
    border: 1px solid #DDD;
    border-radius: 5px;
  }
  input[type="submit"] {
    padding: 10px 20px;
    background-color: #3B7B8E;
    color: #FFF;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }
  
  .caixa {
    padding: 15vh;
    box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.3);
    background-color: #bff9f9;
    height: 100vh;
    text-align: center;
  }
  .voltar {
  color: #00A66E;
  font-weight: 600;
}
   </style>
</head>
<body>
  <div class="caixa">
  <a class="voltar" href="index.php">Gerenciar diciplina</a>
  <hr>
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
  $stmt = $conn->prepare("DELETE FROM disciplina WHERE nomedisciplina = :nomedisciplina");
  $stmt->bindParam(':nomedisciplina', $nome);

  $stmt->execute();

  // Redireciona para a página principal de disciplinas
  header("Location: index.php");
  exit();
}
?>
