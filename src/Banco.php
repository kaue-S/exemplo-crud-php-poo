<?php
namespace ExemploCrudPoo;

use PDO, Exception;

abstract class Banco {

    private static string $servidor = "localhost";
    private static string $usuario = "root";
    private static string $senha = "";
    private static string $banco = "vendas_2";

    private static PDO $conexao; // se for desta forma é usado o "use PDO"

    //metodo de coneão ao banco (sera usado pelas outras classes)
    public static function conecta():PDO {
        try {
            self::$conexao = new PDO(
                "mysql:host=".self::$servidor.";dbname=".self::$banco.";charset=utf8",
                self::$usuario, self::$senha
            ); 
            
            self::$conexao->setAttribute(
                PDO::ATTR_ERRMODE, 
                PDO::ERRMODE_EXCEPTION
            );
        } catch(Exception $erro){
            die("Deu ruim: ".$erro->getMessage());
        }

        return self::$conexao;
    }
}








