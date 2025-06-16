<?php 
session_start(); // iniciando a sesssao

if (
    !isset($_SESSION['usuario']) || 
    !isset($_SESSION['senha']) ||
    !isset($_SESSION['id']) // colocando uma regra para que seja acessado o conteudo do meu sistema
) {
    header('location:index.php?codigo=1');
    exit; // caso de erro vai ser cancelado o script junto enviando o codigo um para
}
?>