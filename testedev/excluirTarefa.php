<?php 
include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './func/functions.php';

$dados_delete = filter_input_array(INPUT_POST, FILTER_DEFAULT);

// verificação id
if (!isset($dados_delete['id']) || empty($dados_delete['id'])) {
    die('Erro: ID da tarefa não informado.');
}

$idTarefa = $dados_delete['id'];

// func exclusão
$resultado = excluirRegistro('tarefas', 'idtarefas', $idTarefa);

if ($resultado === true) {
    echo 'Tarefa excluída com sucesso!';
} elseif ($resultado === false) {
    echo 'Nenhuma tarefa encontrada com esse ID.';
} else {
    echo 'Erro ao excluir: ' . $resultado;
}
