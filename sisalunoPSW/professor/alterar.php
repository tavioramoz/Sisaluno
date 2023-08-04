<?php
// Código para conexão com o banco de dados 
require_once "../conn.php";

// Verifica se o ID do professor foi fornecido
if (!isset($_GET["id"])) {
  // Redireciona de volta para a página principal de professores
  header("Location: index.php");
  exit();
}

$id = $_GET["id"];

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = $_POST["nome"];
  $cpf = $_POST["cpf"];
  $idade = $_POST["idade"];
  $datanascimento = $_POST["datanascimento"];
  $endereco = $_POST["endereco"];
  $status = $_POST["status"];

  // Prepara e executa a query para atualizar os dados do professor no banco de dados
  $stmt = $conn->prepare("UPDATE Professor SET nome = :nome, cpf = :cpf, idade = :idade, datanascimento = :datanascimento, endereco = :endereco, estatus = :status WHERE id = :id");
  $stmt->bindParam(':id', $id);
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

// Obtém os dados do professor a serem alterados do banco de dados
$stmt = $conn->prepare("SELECT * FROM Professor WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$professor = $stmt->fetch(PDO::FETCH_ASSOC);

// Verifica se o professor existe
if (!$professor) {
  // Redireciona de volta para a página principal de professores
  header("Location: index.php");
  exit();
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Alterar Professor</title>
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
    <a class="voltar" href="index.php">Gerenciar professor</a>
    <hr>
    <h1>Alterar Professor</h1>
    <hr>
    <form method="POST">
      <input type="hidden" name="id" value="<?php echo $professor['id']; ?>">
      <label for="nome">Nome:</label>
      <input type="text" name="nome" id="nome" value="<?php echo $professor['nome']; ?>" required>
      <br><br>
      <label for="cpf">CPF:</label>
      <input type="text" name="cpf" id="cpf" value="<?php echo $professor['cpf']; ?>" required>
      <br><br>
      <label for="idade">Idade:</label>
      <input type="number" name="idade" id="idade" value="<?php echo $professor['idade']; ?>" required>
      <br><br>
      <label for="datanascimento">Data de Nascimento:</label>
      <input type="date" name="datanascimento" id="datanascimento" value="<?php echo $professor['datanascimento']; ?>" required>
      <br><br>
      <label for="endereco">Endereço:</label>
      <input type="text" name="endereco" id="endereco" value="<?php echo $professor['endereco']; ?>" required>
      <br><br>
      <label for="status">Status:</label>
      <select name="status" id="status" value="<?php echo $professor['estatus']; ?>" required>
          <option value="AT">Ativo</option>
          <option value="NT">Não ativo</option>
        </select> 
      <input type="submit" value="Alterar">
    </form>
  </div>
</body>

</html>