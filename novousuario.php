<?php require_once 'Include.php/funcoes.php';
// verificando se o form foi enviado
if (form_nao_enviado()) {
        header('location:cadastro.php?codigo=1');
        exit;
    }
// verificando se tem algum campo em branco
if (form_em_branco_cadastro()) {
        header('location:cadastro.php?codigo=2');
        exit;
    }
// definindo variaveis  para o array associativo que gerou meu form
$email_cadastro = $_POST['email_cadastro'];
$senha_cadastro = $_POST['senha_cadastro'];
$login_cadastro = $_POST['login_cadastro'];
// incluindo conexao
require_once 'Include.php/conexao.php';
// chamando funcao de conectar no banco
$conn = conectar_banco();
// query
$sql = "INSERT INTO usuario (loginn, senha, email) 
            VALUES (?, ?, ?)";
// preparando a conexao junto com a query.
$stmt = mysqli_prepare($conn, $sql);
// verificando se houve algum erro com a conexao ou qual minha query
if (!$stmt) {
        exit ("<h3>Erro na preparação da consulta</h3>");
    }
 // preparando variaveis para receber minha requisicao ao banco da dados   
mysqli_stmt_bind_param($stmt, "sss", $login_cadastro, $senha_cadastro, $email_cadastro);
// verificar se o statentmet foi executado com sucesso
if (!mysqli_stmt_execute($stmt)){
        exit ("<h3>Erro ao cadastrar. 
        Verifique o erro e tente novamente: " 
        . mysqli_stmt_error($stmt) . "</h3>");
    }

    // fechando o statement  e o banco de dados
    mysqli_stmt_close($stmt); 
    mysqli_close($conn); 
    // redirecionando a rota
    header('location:index.php?codigo=5');
    exit;
?>