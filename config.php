<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "coren341_sistema_agendamento";

// Cria uma conex達o
$conn = new mysqli($servername, $username, $password, $database);

// Verifica a conex達o
if ($conn->connect_error) {
    die("Conex達o falhou: " . $conn->connect_error);
}


?>