<?php

use PDO, Exception;

final class Produto {
    private int $id;
    private string $nome;
    private float $preco;
    private 
    
    /* esta propriedade recebera os recursos PDO atraves da classe Banco (dependencia do projeto) */
    private PDO $conexao;


    public function __construct()
    {
        // no momento em que for criado um objeto a partir da classe Fabricante, automaticamente sera feita a conexao com o banco.

        $this->conexao = Banco::conecta();
    }

function lerProdutos(PDO $conexao):array {
    $sql = "SELECT produtos.id, produtos.nome AS produto, produtos.preco, produtos.descricao, produtos.quantidade, fabricantes.nome AS fabricante FROM produtos INNER JOIN fabricantes ON produtos.fabricante_id = fabricantes.id ORDER BY produto";

    // try vai tentar todos esses comandos
    try {
        $consulta = $conexao->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
        // PDO fetch assoc vai retornar o resultado em array
    }
    // catch vai executar os comandos dentro dele caso algum comando do try não de certo
    // die vai fazer com que o programa pare caso algum erro ocorra
    catch (Exception $erro) {
        die ("Erro: " .$erro->getMessage());
    }
    return $resultado;
}
