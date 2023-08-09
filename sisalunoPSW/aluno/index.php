<?php
// Requer o arquivo de conexão com o banco de dados
require_once "../conn.php";

// Prepara e executa a query para selecionar todos os alunos
$stmt = $conn->prepare("SELECT * FROM aluno");
$stmt->execute();
$alunos = $stmt->fetchAll(PDO::FETCH_ASSOC)
?>

<!DOCTYPE html>
<html>

<head>
    <title>Alunos</title>
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

  /* Aluno */
.aluno-list {
  margin-bottom: 20px;
}

.aluno-list table {
  width: 100%;
  border-collapse: collapse;
}

.aluno-list th,
.aluno-list td {
  padding: 10px;
  border: 1px solid #DDD;
}

.aluno-list th {
  background-color: #F5F5F5;
  text-align: left;
}

  .caixa {
    padding: 15vh;
    box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.3);
    background-color: #bff9f9;
    height: 100%;
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
        <h1>Lista de Alunos</h1>
        <a href="inserir.php">Cadastrar Aluno?</a>
        <hr>
        <br><br>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Idade</th>
                <th>Data de Nascimento</th>
                <th>Endereço</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
            <?php foreach ($alunos as $aluno) { ?>
                <tr>
                    <td><?php echo $aluno['id']; ?></td>
                    <td><?php echo $aluno['nome']; ?></td>
                    <td><?php echo $aluno['idade']; ?></td>
                    <td><?php echo $aluno['datanascimento']; ?></td>
                    <td><?php echo $aluno['endereco']; ?></td>
                    <td><?php echo $aluno['estatus']; ?></td>
                    <td>
                        <a class="alterar" href="alterar.php?id=<?php echo $aluno['id']; ?>">Alterar</a>
                        <a class="excluir" href="excluir.php?id=<?php echo $aluno['id']; ?>">Excluir</a>
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



