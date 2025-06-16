<?php require_once 'lock.php'; ?>
<?php require_once 'Include.php/funcoes.php';
    
    
     if (editar_em_branco()) {
            
            header('location:itens.php?codigo=7');
            exit;
        }
    

    $titulo  = $_POST['titulo'];
    $descricao   = $_POST['descricao'];
    $id     = (int)$_POST['id'];

    require_once 'Include.php/conexao.php';

    $conn = conectar_banco();

    $sql = "UPDATE tarefa SET titulo = ?, descricao = ? 
                WHERE id = ?";

     $stmt = mysqli_prepare($conn, $sql);

     if(!$stmt){
            
            header('location:itens.php?codigo=7');
            exit;
            
        }

     mysqli_stmt_bind_param($stmt, 'ssi', $titulo, $descricao, $id);
     
     if (!mysqli_execute($stmt)){
            exit('<h3>Erro ao executar comando: '. mysqli_stmt_error($stmt) . '</h3>');
        }
      $linhas_afetadas = mysqli_affected_rows($conn);
      
        if ($linhas_afetadas == 0) {
             header('location:itens.php?codigo=9');
                exit;
           
        }

        if ($linhas_afetadas < 0) {
            header('location:itens.php?codigo=9');
                exit;
           
           
        }

         



?>