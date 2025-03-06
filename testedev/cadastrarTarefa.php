<?php 

include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './func/functions.php';


$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$conn = conectar();

if(!empty($dados) && isset($dados)) {

    $nomeTarefa = $dados['tituloTarefa']; 

    var_dump($dados);

    $dataeHoraAtual = date('Y-m-d H:i:s');

    $retornoInsert = cadastrarRegistro('tarefas', 'titulo', "$nomeTarefa");
    echo json_encode($retornoInsert);
} else {
    echo json_encode('Erro no Insert');
} 