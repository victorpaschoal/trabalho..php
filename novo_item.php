<?php require_once 'lock.php'; 
require_once 'Include.php/funcoes.php';
validar_codigo();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo item</title>
</head>
<body>
    <?php require_once 'dashboard.php'; ?>



    <div class="container">
        <div class="form-group">
        <fieldset>
            <h2>Cadastrar nova tarefa</h2>
        <form action="novo_item_validar.php" method="post">

        <p>
            <label for="titulo">Informe qual sua tarefa</label>
            <br><input type="text" name="cadastrar_tarefa" id="cadastrar_tarefa" placeholder="tarefa" class="form-control">
        </p>

        <p>
            <label for="descricao">Explique sua tarefa</label>
            <br><input type="text" name="cadastrar_descricao" id="cadastrar_descricao" placeholder="descricao" class="form-control">
        </p>
        
        <button type="submit">Enviar</button>


        </form>
        </fieldset>
        </div>
    </div>
</body>
</html>