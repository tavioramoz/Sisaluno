<?php
// Requer o arquivo de conexão com o banco de dados
require_once "../conn.php";

// Prepara e executa a query para selecionar todas as disciplinas
$stmt = $conn->prepare("SELECT * FROM disciplina");
$stmt->execute();
$disciplinas = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Função para obter o nome do professor a partir do ID do professor
function getProfessorName($conn, $idprofessor)
{
    $stmt = $conn->prepare("SELECT nome FROM professor WHERE id = :id");
    $stmt->bindParam(':id', $idprofessor);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['nome'];
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Disciplinas</title>
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
  /* Disciplina */
  .disciplina-list {
    margin-bottom: 20px;
  }
  
  .disciplina-list table {
    width: 100%;
    border-collapse: collapse;
  }
  
  .disciplina-list th,
  .disciplina-list td {
    padding: 10px;
    border: 1px solid #DDD;
  }
  
  .disciplina-list th {
    background-color: #F5F5F5;
    text-align: left;
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
  
  /* Estilos CSS para a tabela */
  table {
    border-collapse: collapse;
    width: 100%;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }
  
  th,
  td {
    border: 1px solid #ddd;
    padding: 12px;
    text-align: left;
  }
  
  th {
    background-color: #f5f5f5;
    font-weight: bold;
  }
  
  td {
    font-weight: normal;
  }
  
  tr:nth-child(even) {
    background-color: #f9f9f9;
  }
  
  tr:hover {
    background-color: #f2f2f2;
  }
  
  
  
  .excluir{
    color: red;
    font-weight: 600;
  }
  
  .alterar{
    color: #3B7B8E;
    font-weight: 600;
  }
   </style>
</head>

<body>
    <div class="caixa">
        <h1>Lista de Disciplinas</h1>
        <a href="inserir.php">Cadastrar Disciplina?</a>
        <hr>
        <br><br>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome da Disciplina</th>
                <th>Carga Horária</th>
                <th>Semestre</th>
                <th>Professor</th>
                <th>Ações</th>
            </tr>
            <?php foreach ($disciplinas as $disciplina) { ?>
                <tr>
                    <td><?php echo $disciplina['id']; ?></td>
                    <td><?php echo $disciplina['nomedisciplina']; ?></td>
                    <td><?php echo $disciplina['ch']; ?></td>
                    <td><?php echo $disciplina['semestre']; ?></td>
                    <td><?php echo getProfessorName($conn, $disciplina['idprofessor']); ?></td>
                    <td>
                        <a class="alterar" href="alterar.php?id=<?php echo $disciplina['id']; ?>">Alterar</a>
                        <a class="excluir" href="excluir.php?id=<?php echo $disciplina['id']; ?>">Excluir</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <br>
        <br>
        <a class="voltar" href="../index.php">Gerenciar Sistema</a>
        <hr>
    </div>
</body>

</html>