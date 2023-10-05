<?php
require_once "conecta.php";

function lerFabricantes( PDO $conexao ):array {
    $sql = "SELECT * FROM fabricantes ORDER BY nome";
    
    try {
        $consulta = $conexao->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $erro) {
        die("Erro: ".$erro->getMessage());
    }    

    return $resultado;
} 


