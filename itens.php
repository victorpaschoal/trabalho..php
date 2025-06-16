<?php require_once 'lock.php'; ?>
<?php require_once 'Include.php/funcoes.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITENS CADASTRADOS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <h1>Itens cadastrado: </h1>

    <?php

    validar_codigo();

    require_once 'dashboard.php';

    // incluir arquivo de conexao
    require_once 'Include.php/conexao.php';

    // estabelecer conexão com bd
    $conn = conectar_banco();

    $id = $_SESSION['id'];

    // criar a nossa consulta (query) 
    $query = "SELECT id,titulo, descricao FROM tarefa WHERE usuario_id = $id";

    $resultado = mysqli_query($conn, $query);

    $linha_afetadas = mysqli_affected_rows($conn);

    // verificar se não há registros na tabela
    if ($linha_afetadas == 0) {
        exit("<h3>Para cadastrar o primeira tarefa, </h3><a href='novo_item.php'>clique aqui</a>");
    }

    // verificar se há algum problema como a consulta (query)
    if ($linha_afetadas < 0) {
        exit("<h3>Erro ao exibir clientes cadastrados. 
        Verifique estrutura da consulta</h3>");
    }

    // Enquanto houver registros armazenados dentro de 'resultado'.
    // (registro = linha da tabela = cliente)
    // transforme o registro que está sendo acessado na iteração atual
    // do laço em um arrayu associativo chamado 'cliente'
    echo "<h2>Tarefas Cadastrados</h2>";

    echo '<table class="table table-striped">';
    echo    '<tr>';
    echo        '<th scope="col">ID #</th>';
    echo        '<th scope="col">Titulo</th>';
    echo        '<th scope="col">descricao</th>';
    echo         '<th scope="col">alterar</th>';
    echo    '</tr>';

    while ($taref = mysqli_fetch_assoc($resultado)) {

        // mostrar os dados do array associativo na iteração atual:
        echo '<tr>';
            echo '<td scope="row"> ' .  $taref['id']    . '</td>';
            echo '<td>' .  $taref['titulo']  . '</td>';
            echo '<td>' .  $taref['descricao'] . '</td>';
            echo '<td>';
            echo        '<a href="excluir.php?id=' . $taref['id'] .'">Excluir</a> | ';
            echo        '<a href="editar_item.php?id='  . $taref['id'] .'">Editar</a>';
            echo '</td>';
        echo '</tr>';
    }

    echo '</table>';

    mysqli_close($conn);

    ?>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>