<?php
function listarGeral($campos, $tabela)
{
    $conn = conectar(); 

    $sqlLista = "SELECT $campos FROM $tabela";

    $result = $conn->query($sqlLista);

    if (!$result) {
        $conn->close();
        return 'Erro na consulta: ' . $conn->error;
    }

    if ($result->num_rows > 0) {
        $dados = $result->fetch_all(MYSQLI_ASSOC); // Obtém os dados
        $conn->close();
        return $dados;
    } else {
        $conn->close();
        return 'Vazio';
    }
}

function excluirRegistro($tabela, $campoid, $id)
{
    $conn = conectar(); 

    $queryListar = $conn->prepare("DELETE FROM $tabela WHERE $campoid = ?");

    if (!$queryListar) {
        return 'Erro ao preparar a consulta: ' . $conn->error;
    }

    $queryListar->bind_param('i', $id); 

    $executou = $queryListar->execute();
    $linhasAfetadas = $queryListar->affected_rows;

    $queryListar->close();
    $conn->close();

    if ($executou && $linhasAfetadas > 0) {
        return true;
    } elseif ($executou) {
        return false; 
    } else {
        return 'Erro ao executar a consulta.';
    }
}

function cadastrarRegistro($tabela, $campos, $value1)
{
    $conn = conectar(); 
    
    $queryInsert = $conn->prepare("INSERT INTO $tabela ($campos) VALUES (?)");
    
    $queryInsert->bind_param("s", $value1); 

    if ($queryInsert->execute()) {
        $idGravado = $conn->insert_id; 
        return $idGravado; 
    } else {
        return 'Vazio'; 
    }
}

function formatarDataHoraBr($data)
{
    return date('d/m/Y H:i:s', strtotime($data));
}


?>
