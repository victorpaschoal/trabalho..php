<?php require_once 'lock.php' ; // confirmando se alguem entrou aqui de maneira ilegal 
require_once 'Include.php/funcoes.php'; // incluindo minha funcao
validar_codigo();?> <!-- chamando a funcao para validar o codigo e exibir alguma informacao --> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo item</title>
</head>
<body>
    <?php require_once 'dashboard.php'; ?> <!-- importando a navegacao do Home -->


<!-- inicio do form para novo item -->
    <div class="container"> <!-- utilizando bootstrap -->
        <div class="form-group"> <!-- utilizando bootstrap -->
        <fieldset>
            <h2>Cadastrar nova tarefa</h2>
        <form action="novo_item_validar.php" method="post"> <!-- utilizando bootstrap -->

        <p>
            <label for="titulo">Informe qual sua tarefa</label>
            <br><input type="text" name="cadastrar_tarefa" id="cadastrar_tarefa" placeholder="tarefa" class="form-control"> <!-- utilizando bootstrap -->
        </p>

        <p>
            <label for="descricao">Explique sua tarefa</label>
            <br><input type="text" name="cadastrar_descricao" id="cadastrar_descricao" placeholder="descricao" class="form-control"> <!-- utilizando bootstrap -->
        </p>
        
        <button type="submit">Enviar</button>


        </form>
        <!-- fim do form -->
        </fieldset>
        </div>
    </div>
</body>
</html>