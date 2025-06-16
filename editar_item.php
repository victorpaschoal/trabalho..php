<?php require_once 'lock.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editar</title>
</head>
<body>
    <?php require_once 'Include.php/funcoes.php'; // icluind a pagina de funcao
    
    
     if (id_nao_recebido()){
            exit("<h3>Erro ao editar cliente: ID não especificado</h3>");
        }

     $id = (int)$_GET['id'];   
    
    
    
     require_once 'Include.php/conexao.php';

     $conn = conectar_banco();

     $query = "SELECT * FROM tarefa WHERE id = $id";

     $resultado = mysqli_query($conn, $query);

     $linhas_afetadas = mysqli_affected_rows($conn);

     if ($linhas_afetadas == 0) {
            exit("<h3>Não foi possível carregar dados do cliente especificado</h3>");
        }
     if ($linhas_afetadas < 0) {
            exit("<h3>Erro ao buscar dados do cliente. Verifique estrutura da consulta</h3>");
        }

        // transformar em array associativo o cliente armazenado em '$resultado'
        $tarefa = mysqli_fetch_assoc($resultado);
    
    ?>

    <?php require_once 'dashboard.php'; ?>
    <div class="container">
            <div class="form-group">
                <h2>Editar Tarefa</h2>

                <form action="editado.php" method="post">

                <label for="titulo">titulo: </label><br>
                <input type="text" name="titulo" id="titulo"
                value="<?= $tarefa['titulo']; ?>" class="form-control"><br><br>

                <label for="descricao">E-mail: </label><br>
                <input type="descricao" name="descricao" id="descricao"
                value="<?= $tarefa['descricao']; ?>" class="form-control"><br><br>


                <input type="hidden" name="id" value="<?= $id; ?>">
                <button type="submit">Editar</button>

                </form>
        </div>
    </div>

</body>
</html>