<?php
// Código para conexão com o banco de dados (adapte as configurações de acordo com o seu ambiente)
require_once "../conn.php";

// Verifica se o ID da disciplina foi fornecido
if (!isset($_GET["id"])) {
  // Redireciona de volta para a página principal de disciplinas
  header("Location: index.php");
  exit();
}

$id = $_GET["id"];

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nomedisciplina = $_POST["nomedisciplina"];
  $ch = $_POST["ch"];
  $semestre = $_POST["semestre"];
  $idprofessor = $_POST["idprofessor"];

  // Prepara e executa a query para atualizar os dados da disciplina no banco de dados
  $stmt = $conn->prepare("UPDATE Disciplina SET nomedisciplina = :nomedisciplina, ch = :ch, semestre = :semestre, idprofessor = :idprofessor WHERE id = :id");
  $stmt->bindParam(':id', $id);
  $stmt->bindParam(':nomedisciplina', $nomedisciplina);
  $stmt->bindParam(':ch', $ch);
  $stmt->bindParam(':semestre', $semestre);
  $stmt->bindParam(':idprofessor', $idprofessor);

  $stmt->execute();

  // Redireciona para a página principal de disciplinas
  header("Location: index.php");
  exit();
}

// Obtém os dados da disciplina a serem alterados do banco de dados
$stmt = $conn->prepare("SELECT * FROM Disciplina WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$disciplina = $stmt->fetch(PDO::FETCH_ASSOC);

// Verifica se a disciplina existe
if (!$disciplina) {
  // Redireciona de volta para a página principal de disciplinas
  header("Location: index.php");
  exit();
}

// Prepara e executa a query para selecionar todos os professores
$stmt = $conn->prepare("SELECT id, nome FROM Professor");
$stmt->execute();
$professores = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>

<head>
  <title>Alterar Disciplina</title>
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
    <h1>Alterar Disciplina</h1>
    <hr>
    <form method="POST">
      <input type="hidden" name="id" value="<?php echo $disciplina['id']; ?>">
      <label for="nomedisciplina">Nome da Disciplina:</label>
      <input type="text" name="nomedisciplina" id="nomedisciplina" value="<?php echo $disciplina['nomedisciplina']; ?>" required>
      <br><br>
      <label for="ch">Carga Horária:</label>
      <input type="text" name="ch" id="ch" value="<?php echo $disciplina['ch']; ?>" required>
      <br><br>
      <label for="semestre">Semestre:</label>
      <input type="text" name="semestre" id="semestre" value="<?php echo $disciplina['semestre']; ?>" required>
      <br><br>
      <label for="idprofessor">Professor:</label>
      <select name="idprofessor" id="idprofessor" required>
        <option value="">Selecione um professor</option>
        <?php foreach ($professores as $professor) { ?>
          <option value="<?php echo $professor['id']; ?>" <?php if ($professor['id'] == $disciplina['idprofessor']) echo 'selected'; ?>><?php echo $professor['nome']; ?></option>
        <?php } ?>
      </select>
      <br><br>
      <input type="submit" value="Alterar">
    </form>
  </div>
</body>

</html>