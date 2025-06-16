<?php require_once 'lock.php'; 

    if (!isset($_GET['id'])) {
        header('location:itens.php?codigo=1');
        exit;
    }

    // recebe parâmetro via GET convertendo-o para int
    $id_tarefa = (int)$_GET['id'];

    require_once 'Include.php/conexao.php';

    $conn = conectar_banco();

    $id_usuario = $_SESSION['id'];
    // query para cancelamento
    $sql = "DELETE FROM tarefa WHERE id = $id_tarefa 
            AND usuario_id = $id_usuario";
    
    mysqli_query($conn, $sql);

    $linhas = mysqli_affected_rows($conn);

    if ($linhas <= 0) { // verifica se há erro na consulta sql
        header('location:itens.php?codigo=5');
        exit;
    }
    
    header('location:itens.php?codigo=11');

?>