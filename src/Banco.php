<?php
namespace CrudPoo;

/* indicamos o uso das classes nativas do PHP (ou seja, classes que não fazem parte do nosso namespace) */
use PDO, Exception;

abstract class Banco {
    // propriedades/atributos de acesso ao servidor de banco de dados
    // classe privada so pode ser usada em um arquivo especifico
    private static $servidor = "localhost";
    private static $usuario = "root";
    private static $senha = "";
    private static string $banco = "vendas";

    // private static \PDO $conexao; // nao precisa do use PDO 
    private static PDO $conexao; // precisa do use no PDO

    /* metodo de conexao ao banco */
    public static function conecta():PDO {
        try {
            self::$conexao = new PDO (
            "mysql:host=".self::$servidor."
            dbname=".self::$banco." charset=utf=8",
            self::$usuario,
            self::$senha
            /*
            self permite acessar recursos estaticos da propria classe
            */
            );
            self::$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            echo "OK!";
        } catch (Exception $erro) {
            die ("deu ruim! ".$erro->getMessage());
        }
        return self::$conexao;
    }
}
Banco::conecta(); // teste