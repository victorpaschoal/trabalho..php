<?php require_once 'Include.php/funcoes.php';

if (form_nao_enviado()) {
        header('location:cadastro.php?codigo=1');
        exit;
    }

if (form_em_branco_cadastro()) {
        header('location:cadastro.php?codigo=2');
        exit;
    }

$email_cadastro = $_POST['email_cadastro'];
$senha_cadastro = $_POST['senha_cadastro'];
$login_cadastro = $_POST['login_cadastro'];

require_once 'Include.php/conexao.php';

$conn = conectar_banco();

$sql = "INSERT INTO usuario (loginn, senha, email) 
            VALUES (?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
        exit ("<h3>Erro na preparação da consulta</h3>");
    }
mysqli_stmt_bind_param($stmt, "sss", $login_cadastro, $senha_cadastro, $email_cadastro);

if (!mysqli_stmt_execute($stmt)){
        exit ("<h3>Erro ao cadastrar. 
        Verifique o erro e tente novamente: " 
        . mysqli_stmt_error($stmt) . "</h3>");
    }

 
    mysqli_stmt_close($stmt); 
    mysqli_close($conn); 

    header('location:index.php?codigo=5');
    exit;
?>