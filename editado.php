<?php require_once 'lock.php'; ?> <!-- verificando se sessao esta ocorrendo -->
<?php require_once 'Include.php/funcoes.php'; // incluindo a pagina funcao
    
    
     if (editar_em_branco()) { // vendo se algum campo esta em branco
            
            header('location:itens.php?codigo=7');
            exit;
        }
    if(form_nao_enviado()){ // verificando se o form foi enviado
        header('location:itens.php?codigo=7');
            exit;
    }

    $titulo  = $_POST['titulo']; // tribundo valores a variaveis
    $descricao   = $_POST['descricao'];
    $id     = (int)$_POST['id'];
 
    require_once 'Include.php/conexao.php'; // incluindo a conexao

    $conn = conectar_banco(); // iniciando a conexao

    $sql = "UPDATE tarefa SET titulo = ?, descricao = ?  
                WHERE id = ?"; // requisicao a meu banco de dados

     $stmt = mysqli_prepare($conn, $sql); // preparando a consulta

     if(!$stmt){
            
            header('location:itens.php?codigo=7');
            exit;
            
        } // ver se deu algum erro com minha conexao ou qiuery

     mysqli_stmt_bind_param($stmt, 'ssi', $titulo, $descricao, $id); // preparando a bind
     
     if (!mysqli_execute($stmt)){
            exit('<h3>Erro ao executar comando: '. mysqli_stmt_error($stmt) . '</h3>');
        } // ver se deu algum erro com meu bind
      $linhas_afetadas = mysqli_affected_rows($conn); // armazenando linhas afetadas 
      
        if ($linhas_afetadas == 0) {
             header('location:itens.php?codigo=9');
                exit; // logica para ver se algo foi alterado
           
        }

        if ($linhas_afetadas < 0) {
            header('location:itens.php?codigo=9');
                exit; // logica para ver se algo foi alterado
           
           
        }
        header('location:itens.php?codigo=12'); // se deu certo vai repassar para pagina itens com codigo 12, de parametro
         



?>