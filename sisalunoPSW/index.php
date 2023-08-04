<!DOCTYPE html>
<html>
<head>
    <title>SisAluno - Otavio</title>
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
/* Estilos do botão */
button.botao {
  display: inline-block;
  margin: 10px;
  font-size: 20px;
  text-decoration: none;
  color: #fff;
  cursor: pointer;
  text-decoration: none;
  padding: 10px;
  border-radius: 10px;
  border: 0.1px solid #7b7b7b ;
  background-color: #000000;
  font-weight: bold;
  cursor: pointer;
}


/* Efeito de hover (quando o cursor está sobre o botão) */
button.botao:hover {
  background-color: #45a049;
}
h1 {
  color: #3E3D3C;
  font-size: 40px;
}

a {
  color: red;
  text-decoration: none;
}

ul {
  list-style-type: none;
  padding: 0;
}

li {
  margin-bottom: 10px;
}

.caixa {
  padding: 15vh;
  box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.3);
  background-color: #bff9f9;
  height: 100vh;
  text-align: center;
}



</style>

</head>

<body>
    <div class="caixa">
        <h1>Sistema de Cadastro</h1>
        <div class="menu">
            <form>
            <button class="botao"> <a href="aluno/index.php">Gerenciar Alunos</a> </button>
            <hr>
            <br>
            <br>
            <button class="botao"> <a href="professor/index.php">Gerenciar Professores</a> </button>
            <hr>
            <br>
            <br>
            <button class="botao"> <a href="disciplina/index.php">Gerenciar Disciplinas</a> </button>
            <hr>
            </form>
        </div>
    </div>
</body>
</html>
