<?php
include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './func/functions.php';

$idTarefa = filter_input(INPUT_POST, 'idTarefa', FILTER_SANITIZE_NUMBER_INT);

if ($idTarefa) {
    $conn = conectar();
    $query = "UPDATE tarefas SET status = 'Pendente' WHERE idtarefas = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $idTarefa);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'sucesso']);
    } else {
        echo json_encode(['status' => 'erro', 'message' => 'Erro ao reverter status']);
    }
} else {
    echo json_encode(['status' => 'erro', 'message' => 'ID da tarefa não informado']);
}
?>
