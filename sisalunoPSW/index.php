<!DOCTYPE html>
<html>
<head>
    <title>Gerenciamento do corpo Academico</title>
    <style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&family=Sora:wght@100;200;300;400;500;600;700;800&display=swap');
    body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  width: 100%;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  background-image: url(imagem.index.avif);
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
        <h1>Gerenciamento <br> do <br> Corpo Acadêmico</h1>
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
