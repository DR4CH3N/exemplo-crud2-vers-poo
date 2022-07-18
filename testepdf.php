<?php

require_once 'vendor/autoload.php';

use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf(); // objeto

$conteudohtml = "<h2>PHP para PDF</h2>
                <p style='color:red; text-shadow:black 2px 2px 5px'>Testando a LIB domPDF</p>";


// $dompdf->loadHtml('hello world'); // metodo

$dompdf->loadHtml($conteudohtml); // metodo

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape'); // ou portrait

// Render the HTML as PDF
$dompdf->render(); //

// Output the generated PDF to Browser
$dompdf->stream();