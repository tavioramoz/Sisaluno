# Sisaluno
Atividade Sisaluno

## Banco de Dados

DROP DATABASE IF EXISTS sisaluno;
CREATE DATABASE sisaluno;

USE sisaluno;

CREATE TABLE Aluno (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(100),
  idade SMALLINT,
  datanascimento DATE,
  endereco VARCHAR(100),
  estatus CHAR(20)
);

CREATE TABLE Professor (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(100),
  cpf VARCHAR(11),
  idade SMALLINT,
  datanascimento DATE,
  endereco VARCHAR(100),
  estatus BOOL
);
  
CREATE TABLE Disciplina (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nomedisciplina VARCHAR(100),
  ch VARCHAR(3),
  semestre VARCHAR(5),
  idprofessor SMALLINT,
  FOREIGN KEY (idprofessor) REFERENCES Professor(id)
);

