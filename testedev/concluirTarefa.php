<?php
include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './func/functions.php';


$idTarefa = filter_input(INPUT_POST, 'idTarefa', FILTER_SANITIZE_NUMBER_INT);

// Verificacao id
if ($idTarefa) {

    $conn = conectar();

    // att o status da tarefa no banco de dados para 'Concluída'
    $query = "UPDATE tarefas SET status = 'Concluída' WHERE idtarefas = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $idTarefa);  // Associa o ID da tarefa à query

    // Executa a query e retorna o resultado
    if ($stmt->execute()) {
        echo json_encode(['status' => 'sucesso']);
    } else {
        echo json_encode(['status' => 'erro', 'message' => 'Erro ao atualizar status']);
    }
} else {
    echo json_encode(['status' => 'erro', 'message' => 'ID da tarefa não informado']);
}
