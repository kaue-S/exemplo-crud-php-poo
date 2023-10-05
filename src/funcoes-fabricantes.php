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

function excluirFabricante(PDO $conexao, int $id):void {
    $sql = "DELETE FROM fabricantes WHERE id = :id";
    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(":id", $id, PDO::PARAM_INT);
        $consulta->execute();
    } catch (Exception $erro) {
        die("Erro ao excluir: ".$erro->getMessage());
    }
} 

