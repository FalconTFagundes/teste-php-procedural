<?php

include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './func/functions.php';

$acao = filter_input(INPUT_POST, 'acao', FILTER_SANITIZE_STRING);

switch ($acao) {

    case 'excluirTarefa':
        include_once 'excluirTarefa.php';
        break;

    case 'cadastrarTarefa':
        include_once 'cadastrarTarefa.php';
        break;

    case 'concluirTarefa':
        include_once 'concluirTarefa.php';
        break;

    case 'reverterConcluida':
        include_once 'reverterConcluida.php';
        break;
}
