<?php
// Configurações do banco de dados
$servername = "10.70.230.53:3306"; // Nome do servidor
$username = "sisaluno"; // Nome de usuário do banco de dados
$password = "sisaluno2023"; // Senha do banco de dados
$dbname = "sisaluno"; // Nome do banco de dados

// Conexão com o banco de dados usando PDO
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}

?>