<?php
// exportar-pdf.php

use CrudDiversos\Utilitarios;
use Dompdf\Dompdf;
use Dompdf\Options;

require_once "vendor/autoload.php";

session_start(); // inicializando a session
// Utilitarios::teste($_SESSION['dados']);
$paragrafo = "";
foreach ($_SESSION['dados'] as $fabricante) {
    $paragrafo .= "<p>". $fabricante['nome'] ."</p>";
    // .= vai concatenando multiplos elementos
    // caso for apenas o = ele apenas coloca o ultimo elemento 
}



// conteudo HTML para o resumo usando sintaxe heredoc PHP
$data = date("d/m/y");
$conteudo = <<<HTML
    <div style="border: solid 2px; padding: 10px; width: 70%; margin:auto">
    <h2>Resumo de fabricantes - $data</h2>
    $paragrafo
    </div>
HTML;

// echo $conteudo;
// die(); // parando o script por aqui

$options = new Options();
$options->set('DefaultFont', 'Courier');

$dompdf = new Dompdf($options);

// nesta sintaxe nao funcionou
// $options = $dompdf->getOptions();
// $options->setDefaultFont('verdana');
// $dompdf->setOptions($options);


$dompdf->loadHtml($conteudo);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("resumo de fabricantes - ".date("d-m-y").".pdf");
// stream serve para poder mudar o nome do arquivo de PDF no qual voce baixa
