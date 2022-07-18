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
            <input type="text" name="nome" id="nome">

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