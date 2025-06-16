<?php require_once 'Include.php/funcoes.php';

// chamando funcao para verificar se foi enviado via POST
if (form_nao_enviado()) {
        header('location:index.php?codigo=1');
        exit;
    }
// se tem algum campo em branco
if (form_em_branco()) {
        header('location:index.php?codigo=2');
        exit;
    }    
// definindo variaveis locais
$usuario = $_POST['login'];
$senha = $_POST['senha'];

// incluindo a conexao com banco de dados
require_once 'Include.php/conexao.php';

$conn = conectar_banco();
// query
  $sql = "SELECT * FROM usuario WHERE loginn = ? AND senha = ?";

 $stmt = mysqli_prepare($conn, $sql);
    // verificando conecao
 if (!$stmt) { 
        header('location:index.php?codigo=4');
        exit;
    }

    //ajustando bind
  mysqli_stmt_bind_param($stmt, "ss", $usuario, $senha);
    
  // verificando se teve algum erro no que foi requisitado ao banco
  if (!mysqli_stmt_execute($stmt)) { 
        header('location:index.php?codigo=4');
        exit;
    }
    // guardando informacao de linhas
     mysqli_stmt_store_result($stmt); 

      $linhas = mysqli_stmt_affected_rows($stmt);
    // verificando numero de linhas afetadas 
       if ($linhas <= 0) {
        header('location:index.php?codigo=3');
        exit; 
    }
        // atribuindo valores
     mysqli_stmt_bind_result($stmt, $id, $usuario, $senha, $email);
    // fechando conexao
    mysqli_stmt_fetch($stmt);
    // definindo minhas super globais que irao conter na minha sessao
    session_start();
    $_SESSION['id']      = $id;
    $_SESSION['usuario'] = $usuario;
    $_SESSION['senha']   = $senha;
    
    
    
    // caso tudo de certo ira entrar na pagina dashboard
    header('location:dashboard.php');



?>