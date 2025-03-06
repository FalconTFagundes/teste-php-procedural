<?php
function conectar() {
    try {
        $conn = new mysqli(HOST, USER, PASS, DBNAME);

        // verificação de erro de conexão
        if ($conn->connect_error) {
            throw new Exception("Erro ao conectar ao banco de dados: " . $conn->connect_error);
        }

        $conn->set_charset('utf8mb4');
        
    } catch (Exception $e) {
        echo $e->getMessage();
        die();
    }

    return $conn;
}
?>
