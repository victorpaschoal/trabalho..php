<?php require_once 'lock.php';


require_once 'Include.php/funcoes.php';
validar_codigo();

if (form_em_branco_tarefa()) {
   
   header('location:novo_item.php?codigo=2');
        exit;
}

if(form_nao_enviado()){
    
    header('location:novo_item.php?codigo=1');
        exit;
}

$tarefa = $_POST['cadastrar_tarefa'];
$descricao = $_POST['cadastrar_descricao'];
$usuario_id = $_SESSION['id'];

require_once 'Include.php/conexao.php';

$conn = conectar_banco();

$sql = "INSERT INTO tarefa (titulo, descricao, usuario_id) 
            VALUES (?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql);


if (!$stmt) {
        exit ("<h3>Erro na preparação da consulta</h3>");
    }

mysqli_stmt_bind_param($stmt, "sss", $tarefa, $descricao, $usuario_id);

if (!mysqli_stmt_execute($stmt)){
        exit ("<h3>Erro ao cadastrar. 
        Verifique o erro e tente novamente: " 
        . mysqli_stmt_error($stmt) . "</h3>");
    }

echo "<h3>Atividade cadastrada com sucesso!</h3>";



mysqli_stmt_close($stmt); 
    mysqli_close($conn); 

header('location:novo_item.php?codigo=6')







?>