<?php

require_once "../conn.php";

// Prepara e executa a query para selecionar todos os professores
$stmt = $conn->prepare("SELECT id, nome FROM professor");
$stmt->execute();
$professores = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nomedisciplina = $_POST["nomedisciplina"];
  $ch = $_POST["ch"];
  $semestre = $_POST["semestre"];
  $idprofessor = $_POST["idprofessor"];

  // Prepara e executa a query para inserir a disciplina no banco de dados
  $stmt = $conn->prepare("INSERT INTO disciplina (nomedisciplina, ch, semestre, idprofessor) VALUES (:nomedisciplina, :ch, :semestre, :idprofessor)");
  $stmt->bindParam(':nomedisciplina', $nomedisciplina);
  $stmt->bindParam(':ch', $ch);
  $stmt->bindParam(':semestre', $semestre);
  $stmt->bindParam(':idprofessor', $idprofessor);

  $stmt->execute();

  // Redireciona para a página principal de disciplinas
  header("Location: index.php");
  exit();
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Inserir Disciplina</title>
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
    <h1>Cadastrar Disciplina</h1>
    <form method="POST">
      <label for="nomedisciplina">Nome da Disciplina:</label>
      <input type="text" name="nomedisciplina" id="nomedisciplina" maxlength= "100" required>
      <br><br>
      <label for="ch">Carga Horária:</label>
      <input type="text" name="ch" id="ch" maxlength= "5" required>
      <br><br>
      <label for="semestre">Semestre:</label>
      <input type="text" name="semestre" id="semestre" maxlength= "5" required>
      <br><br>
      <label for="idprofessor">Professor:</label>
      <select name="idprofessor" id="idprofessor" required>
        <option value="">Selecione um professor</option>
        <?php foreach ($professores as $professor) { ?>
          <option value="<?php echo $professor['id']; ?>"><?php echo $professor['nome']; ?></option>
        <?php } ?>
      </select>
      <br><br>
      <input type="submit" value="Inserir">
    </form>
  </div>
</body>

</html>