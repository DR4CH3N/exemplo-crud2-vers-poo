<?php
namespace CrudPoo;

use PDO;

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
        $this->nome = $nome;

        
    }

    
   
}