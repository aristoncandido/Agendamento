<?php

include_once('config.php');

session_start();

if (isset($_POST['local']) && isset($_POST['sala'])) {
    $local = $_POST['local'];  // Valida e sanitiza o local
    $sala = $_POST['sala'];   // Valida e sanitiza a sala

    // Verificar se a conexão com o banco de dados foi estabelecida corretamente
    if ($conn->connect_error){
        die('Erro de conexão com o banco de dados: ' . $conn->connect_error);
    }

    // Consulta no banco
    $sql = "SELECT * FROM agenda_salas WHERE sala = ? ";

    $stmt = $conn->prepare($sql); // Prepara a consulta

    if (!$stmt) {
        die('Erro ao preparar a consulta: ' . $conn->error);
    }

    // Correção: Vincular o parâmetro à consulta preparada
    $stmt->bind_param('s', $sala);

    // Correção: Executar a consulta preparada
    if (!$stmt->execute()) {
        die('Erro ao executar a consulta: ' . $stmt->error);
    }

    $result = $stmt->get_result();

    // Obtém o resultado da consulta
    if ($result->num_rows > 0) {
        $evento = $result->fetch_assoc();         // -> Recupera o evento como array associativo
        $agenda = json_encode($evento);
        echo $agenda;
    } else {
        http_response_code(404); // Retorna código de status HTTP 404 se não houver dados
        echo json_encode(array('error' => 'Nenhum agendamento encontrado.'));
    }
} else {
    http_response_code(400); // Retorna código de status HTTP 400 para solicitações inválidas
    echo json_encode(array('error' => 'Parâmetros Inválidos'));
}

?>



<!-- 
/* // Busca agendamentos
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
} */
 -->
