<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

if (isset($_POST['enviar'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $assunto = $_POST['assunto'];
    $mensagem = $_POST['mensagem'];
}

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
$mail->CharSet = "UTF-8";

try {
    //Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.mailtrap.io';
    $mail->SMTPAuth = true;
    $mail->Port = 2525;
    $mail->Username = '7fb659e987c901';
    $mail->Password = '95e59bc2a080bf';

    //Quem envia
    $mail->setFrom('fulano@outlook.com', 'Site crud');

    // que recebe
    $mail->addAddress('cicrano@outlook.com', 'fulano');    
          
    $mail->addReplyTo($email, 'Retorno do contato');

    //Attachments


    //Content
    $mail->isHTML(true);         

    //Set email format to HTML
    $mail->Subject = "contato site - ".$assunto;

    // corpo da mensagem
    $mail->Body    = "<b>Nome:</b> $nome <br> <b>E-mail:</b> $email <br> <b>assunto: $assunto</b> <br> <b>Mensagem:</b> $mensagem";


    $mail->AltBody = "Nome: $nome \n E-mail: $email \n Assunto: $assunto \n Mensagem> $mensagem";

    $mail->send();
    echo 'Mensagem foi enviada!';
} catch (Exception $e) {
    echo "infelizmente nao conseguimos enviar seus dados :( {$mail->ErrorInfo}";
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulario</title>
</head>
<body>
    <h1>formulario simples</h1>

    <form action="" method="post">
        <p>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" required>

        </p>

        <p>
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" required>
        </p>


            <label for="assunto">Assunto:</label>
            <select name="assunto" id="assunto" required>


            <option value=""></option>
            <option value="duvidas">Duvidas</option>
            <option value="reclamacoes">Reclamações</option>
            <option value="elogios">Elogios</option>
            </select>
        </p>

        <p>
            <label for="mensagem">Mensagem</label><br>
            <textarea name="mensagem" id="mensagem" cols="30" rows="10"></textarea>
        </p>
        <button type="submit" name="enviar">Enviar</button>
    </form>
    
</body>
</html>