<!DOCTYPE html>
<html>
<head>
  <title>Inserir Aluno</title>
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
  <a class="voltar" href="index.php">Gerenciar Aluno</a>
  <hr>
      <h1>Cadastrar Aluno</h1>
      <form method="post" action="inserir.php">

        <div class="informacao1">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" placeholder="Digite o nome do aluno" maxlength= "100"required>
        </div>
        <div class="informacao2">
        <label for="idade">Idade:</label>
        <input type="number" id="idade" name="idade" placeholder="Digite a idade do aluno" max= "120" required>
        </div>
        <div class="informacao3">
        <label for="datanascimento">Data de Nascimento:</label>
        <input type="date" id="datanascimento" name="datanascimento" required>
        </div>
        <div class="informacao4">
        <label for="endereco">Endereço:</label>
        <input type="text" id="endereco" name="endereco" placeholder="Digite o endereço do aluno" maxlength= "100" required>
        </div>
        <div class="informacao5">
        <label for="status">Status:</label>
        <select name="status" id="status" required>
          <option value="AP">Aprovado</option>
          <option value="RP">Reprovado</option>
          <option value="TP">Trancado</option>
        </select>
        </div>
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
  $idade = $_POST["idade"];
  $datanascimento = $_POST["datanascimento"];
  $endereco = $_POST["endereco"];
  $status = $_POST["status"];

  // Prepara e executa a query para inserir o aluno no banco de dados
  $stmt = $conn->prepare("INSERT INTO aluno (nome, idade, datanascimento, endereco, estatus) VALUES (:nome, :idade, :datanascimento, :endereco, :status)");
  $stmt->bindParam(':nome', $nome);
  $stmt->bindParam(':idade', $idade);
  $stmt->bindParam(':datanascimento', $datanascimento);
  $stmt->bindParam(':endereco', $endereco);
  $stmt->bindParam(':status', $status);
 
  $stmt->execute();

  // Redireciona para a página principal de alunos
  header("Location: index.php");
  exit();
}
?>