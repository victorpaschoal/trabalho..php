<?php require_once 'Include.php/funcoes.php';
validar_codigo();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
</head>
<body>


    <div class="container">
        <div>
            <fieldset>
                <legend class="blockquote text-center">Cadastro novo usuario </legend>
                <form action="novousuario.php" method="post">
            
            <p>
                <label for="login">login</label>
                <input type="text" name="login_cadastro" id="login_cadastro" class="form-control">
            </p>
            <p>
                <label for="email">email</label>
                <input type="text" name="email_cadastro" id="email_cadastro" class="form-control">
            </p>
            <p>
                <label for="senha">senha</label>
                <input type="password" name="senha_cadastro" id="senha_cadastro" class="form-control">
            </p>
            <button type="submit" class="btn btn-primary">Enviar</button>
            </form>

            </fieldset>

            
    
        </div>
    </div>
    
</body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>