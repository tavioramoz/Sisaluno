<?php
// Código para conexão com o banco de dados (adapte as configurações de acordo com o seu ambiente)
require_once "../conn.php";

// Verifica se o ID do aluno foi fornecido
if (!isset($_GET["id"])) {
  // Redireciona de volta para a página principal de alunos
  header("Location: index.php");
  exit();
}

$id = $_GET["id"];

// Verifica se o formulário foi suubmetido no banco de dados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = $_POST["nome"];
  $idade = $_POST["idade"];
  $datanascimento = $_POST["datanascimento"];
  $endereco = $_POST["endereco"];
  $status = $_POST["status"];

  // Prepara e executa a query para atualizar os dados do aluno no banco de dados
  $stmt = $conn->prepare("UPDATE aluno SET nome = :nome, idade = :idade, datanascimento = :datanascimento, endereco = :endereco, estatus = :status WHERE id = :id");
  $stmt->bindParam(':id', $id);
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

// Obtém os dados do aluno a serem alterados do banco de dados
$stmt = $conn->prepare("SELECT * FROM aluno WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$aluno = $stmt->fetch(PDO::FETCH_ASSOC);

// Verifica se o aluno existe
if (!$aluno) {
  // Redireciona de volta para a página principal de alunos
  header("Location: index.php");
  exit();
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Alterar Aluno</title>
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
    <h1>Alterar Aluno</h1>
    <hr>
    <form method="POST">
      <input type="hidden" name="id" value="<?php echo $aluno['id']; ?>">
      <label for="nome">Nome:</label>
      <input type="text" name="nome" id="nome" value="<?php echo $aluno['nome']; ?>" required>
      <br><br>
      <label for="idade">Idade:</label>
      <input type="number" name="idade" id="idade" value="<?php echo $aluno['idade']; ?>" required>
      <br><br>
      <label for="datanascimento">Data de Nascimento:</label>
      <input type="date" name="datanascimento" id="datanascimento" value="<?php echo $aluno['datanascimento']; ?>" required>
      <br><br>
      <label for="endereco">Endereço:</label>
      <input type="text" name="endereco" id="endereco" value="<?php echo $aluno['endereco']; ?>" required>
      <br><br>
      <label for="status">Status:</label>
      <select name="status" id="status" required>
          <option value="<?php echo $aluno['estatus']; ?>"><?php echo $aluno['estatus']; ?></option>
          <option value="AP">Aprovado</option>
          <option value="RP">Reprovado</option>
          <option value="TP">Trancado</option>
      </select>
      <br><br>
      <input type="submit" value="Alterar">
    </form>
  </div>
</body>

</html>