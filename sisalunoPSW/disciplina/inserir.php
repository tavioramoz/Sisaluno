<?php

require_once "../conn.php";

// Prepara e executa a query para selecionar todos os professores
$stmt = $conn->prepare("SELECT id, nome FROM Professor");
$stmt->execute();
$professores = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nomedisciplina = $_POST["nomedisciplina"];
  $ch = $_POST["ch"];
  $semestre = $_POST["semestre"];
  $idprofessor = $_POST["idprofessor"];

  // Prepara e executa a query para inserir a disciplina no banco de dados
  $stmt = $conn->prepare("INSERT INTO Disciplina (nomedisciplina, ch, semestre, idprofessor) VALUES (:nomedisciplina, :ch, :semestre, :idprofessor)");
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
  <link rel="stylesheet" type="text/css" href="../style.css">
</head>

<body>
  <div class="caixa">
    <a class="voltar" href="index.php">Gerenciar diciplina</a>
    <h1>Cadastrar Disciplina</h1>
    <form method="POST">
      <label for="nomedisciplina">Nome da Disciplina:</label>
      <input type="text" name="nomedisciplina" id="nomedisciplina" required>
      <br><br>
      <label for="ch">Carga Horária:</label>
      <input type="text" name="ch" id="ch" required>
      <br><br>
      <label for="semestre">Semestre:</label>
      <input type="text" name="semestre" id="semestre" required>
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