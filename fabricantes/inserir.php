<?php
// verificando se o botão do form foi acionado

use CrudPoo\Fabricante;

require_once "../vendor/autoload.php";

if (isset($_POST['inserir']) ) {
    // importando as funções e a conexão
    
    // usamos o setter para definir o nome do novo fabricante
    $fabricante->setNome( $_POST['nome'] );

    $fabricante = new Fabricante;

    // capturando o que foi digitado no campo nome
    //$nome = $_POST['nome'];
    $fabricante->setNome(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS)
    );
    // filter input vai sanitizar o campo 'nome'  e vai adicionar o nome do filtro

    $fabricante->inserirFabricante();

    var_dump($fabricante);

    // chamando a função e passando os dados de conexão e o nome digitado

    // redirecionamento, vai redirecionar para listar.php quando voce terminar de inserir um fabricante
    // header("location:listar.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir - PHP</title>
</head>
<body>
    <div class="container">
        <h1>Fabricantes | INSERT</h1>
        <hr>
        <p>
            <a href="listar.php">Voltar para a lista de fabricantes</a>
        </p>

        <p>
            <a href="../index.php">Home</a>
        </p>

        <form action="" method="POST">
        <p>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome">
        </p>
        <button type="submit" name="inserir">
            Inserir fabricante
        </button>
        </form>
    </div>
    
</body>
</html>