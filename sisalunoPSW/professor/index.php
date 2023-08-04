<?php
// Requer o arquivo de conexão com o banco de dados
require_once "../conn.php";

// Prepara e executa a query para selecionar todos os professores
$stmt = $conn->prepare("SELECT * FROM professor");
$stmt->execute();
$professores = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Professores</title>
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
 
  /* Professor */
  .professor-list {
    margin-bottom: 20px;
  }
  
  .professor-list table {
    width: 100%;
    border-collapse: collapse;
  }
  
  .professor-list th,
  .professor-list td {
    padding: 10px;
    border: 1px solid #DDD;
  }
  
  .professor-list th {
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
        <h1>Lista de Professores</h1>
        <a href="inserir.php">Cadastrar Professor?</a>
        <hr>
        <br><br>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Idade</th>
                <th>Data de Nascimento</th>
                <th>Endereço</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
            <?php foreach ($professores as $professor) { ?>
                <tr>
                    <td><?php echo $professor['id']; ?></td>
                    <td><?php echo $professor['nome']; ?></td>
                    <td><?php echo $professor['cpf']; ?></td>
                    <td><?php echo $professor['idade']; ?></td>
                    <td><?php echo $professor['datanascimento']; ?></td>
                    <td><?php echo $professor['endereco']; ?></td>
                    <td><?php echo $professor['estatus']; ?></td>
                    <td>
                        <a class="alterar" href="alterar.php?id=<?php echo $professor['id']; ?>">Alterar</a>
                        <a class="excluir" href="excluir.php?id=<?php echo $professor['id']; ?>">Excluir</a>
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

