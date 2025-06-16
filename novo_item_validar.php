<?php require_once 'lock.php'; // verificando se a sessao ainda esta ativa


require_once 'Include.php/funcoes.php';  // incluindo a pagina de funcoes
validar_codigo(); // executa funcao validar_codigo

if (form_em_branco_tarefa()) { // verificando se tem algo em branco
   
   header('location:novo_item.php?codigo=2'); // caso entre aqui, redireciona para pagina com paremetro codigo 2
        exit; // encerrra o script
}

if(form_nao_enviado()){ // verificando se foi enviado o campo via POST
    
    header('location:novo_item.php?codigo=1'); // caso entre aqui, redireciona para pagina com paremetro codigo 1
        exit;  // encerrra o script
}

$tarefa = $_POST['cadastrar_tarefa']; // atribuindo a variaveis as informacoes do formulario que foi enviado via POST
$descricao = $_POST['cadastrar_descricao']; // atribuindo a variaveis as informacoes do formulario que foi enviado via POST
$usuario_id = $_SESSION['id']; // atribuindo a variaveis as informacoes do formulario que foi enviado via POST

require_once 'Include.php/conexao.php'; // incluindo a pagina conexao

$conn = conectar_banco(); // iniciando, o banco com funcao

$sql = "INSERT INTO tarefa (titulo, descricao, usuario_id) 
            VALUES (?, ?, ?)"; // query da requisicao

$stmt = mysqli_prepare($conn, $sql); // enviando as informacoes da conexao junto com query


if (!$stmt) {
        exit ("<h3>Erro na preparação da consulta</h3>");
    } // caso haja algum erro de consulta seja pela query ou pela conexao

mysqli_stmt_bind_param($stmt, "sss", $tarefa, $descricao, $usuario_id); // informando quais variaveis vao ocupar o espaco do banco de dados

if (!mysqli_stmt_execute($stmt)){
        exit ("<h3>Erro ao cadastrar. 
        Verifique o erro e tente novamente: " 
        . mysqli_stmt_error($stmt) . "</h3>"); // erro no bind
    }





mysqli_stmt_close($stmt);  // encerrando a consulta
    mysqli_close($conn);  // encerrando o banco de dados

header('location:novo_item.php?codigo=6') // redirecionando para pagina de cadastro de tarefas com codigo 6







?>