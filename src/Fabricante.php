<?php
namespace CrudPoo;

use PDO, Exception;

final class Fabricante {
    private int $id;
    private string $nome;
    
    /* esta propriedade recebera os recursos PDO atraves da classe Banco (dependencia do projeto) */
    private PDO $conexao;


    public function __construct()
    {
        // no momento em que for criado um objeto a partir da classe Fabricante, automaticamente sera feita a conexao com o banco.

        $this->conexao = Banco::conecta();
    }


    function LerFabricantes():array {
        $sql = "SELECT id, nome FROM fabricantes ORDER BY nome";
        
        try {
        $consulta = $this->conexao->prepare($sql);
    
        $consulta->execute();
        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $erro) {
        die("Erro: " .$erro->getMessage());
    }
        return $resultado;
    }

    function inserirFabricante():void {
        $sql = "INSERT INTO fabricantes(nome) VALUES (:nome)";
        //(:nome) é um parametro e não deve ser usado como variavel ou const
        // Void e um comando que indica que a função nao vai ter retorno
        try {
            // try vai tentar todos esses comandos
            $consulta = $this->conexao->prepare($sql);
            // PDO vai tratar o parametro como string, no caso tratar ele
            // a sintaxe do bindParam funciona assim: bindParam('nome do parametro', $variavel_com_valor, constante de verificação)
            $consulta->bindParam(':nome', $this->nome, PDO::PARAM_STR);
            $consulta->execute();
            
        } catch (Exception $erro) {
            // catch vai executar esses comandos caso algo der errado
    
            die("erro: " .$erro->getMessage());
            // die vai fazer com que o codigo pare caso tiver algum erro, no caso vai mostrar uma mensagem de erro e vai parar o programa
        }
    }









    public function getId(): int
    {
        return $this->id;
    }

    
    public function setId(int $id)
    {
        $this->id = $id;

        
    }



    public function getNome(): string
    {
        return $this->nome;
    }

    
    public function setNome(string $nome)
    {
        $this->nome = filter_var($nome, FILTER_SANITIZE_SPECIAL_CHARS);
        
        
    }

    
   
}