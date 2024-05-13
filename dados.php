<?php

include_once('config.php');

session_start();

if (isset($_REQUEST['local']) && isset($_REQUEST['sala']) && isset($_REQUEST['submit'])) {
    // Verifica se foi setado

    sleep(3); // Dorme por 3 segundos
    $local = filter_input(INPUT_POST, 'local', FILTER_SANITIZE_STRING); // Valida e sanitiza o local
    $sala = filter_input(INPUT_POST, 'sala', FILTER_SANITIZE_STRING); // Valida e sanitiza a sala

    // Consulta no banco
    $sql = 'SELECT * FROM agenda_sala WHERE sala = ?';

    $stmt = $conn->prepare($sql); // Prepara a consulta

    if (!$stmt) {
        die('Erro ao consultar');
    }

    $stmt->bind_param('s', $sala); // Passa o parâmetro para a consulta

    $stmt->execute();

    $result = $stmt->get_result(); // Obtém o resultado da consulta

    if ($result->num_rows > 0) {
        $evento = $result->fetch_array(MYSQLI_ASSOC); // Recupera o evento como array associativo

        echo $evento['sala']; // Acessa a propriedade 'sala' do array

    } else {
        echo "Nenhum registro encontrado";
    }
}

// Busca agendamentos
$stmt = $conn->prepare($sql); // Prepara a consulta (reutiliza a mesma consulta)
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $agendamentos = $result->fetch_all(MYSQLI_ASSOC); // Recupera todos os agendamentos como array associativo
    $agendamento = json_encode($agendamentos);

    header('Content-Type: application/json'); // Correção: Content-Type, não Content-type
    echo $agendamento;
} else {
    http_response_code(404); // Retorna código de status HTTP 404 se não houver dados
    echo json_encode(array('message' => 'Nenhum agendamento encontrado.'));
}

?>