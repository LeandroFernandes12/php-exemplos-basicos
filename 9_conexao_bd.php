<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "exercicio";

try {
    // Tenta criar uma conexão com o banco de dados
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Verifica se houve algum erro na conexão
    if ($conn->connect_error) {
        throw new Exception("Falha na conexão: " . $conn->connect_error);
    }
    echo "Conexão realizada com sucesso!";
} catch (Exception $e) {
    // Exibe uma mensagem de erro amigável
    echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
}
?>

