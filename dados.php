<?php

include_once('config.php');

session_start();

$sql = 'SELECT * FROM agenda_sala WHERE id = 1'; //faz a query
$stmt = $conn->prepare($sql); // prepara a query
$stmt->execute('1'); //executa a query
$result = $stmt->get_result(); 

if ($result->num_rows > 0) {
    $agendamentos = $result->fetch_all(MYSQLI_ASSOC);
    $agendamento = json_encode($agendamentos);

    header('Content-Type: application/json'); // Correção: Content-Type, não Content-type
    echo $agendamento;
} else {
    http_response_code(404); // Retorna código de status HTTP 404 se não houver dados
    echo json_encode(array('message' => 'Nenhum agendamento encontrado.'));
}



?>
