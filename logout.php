<?php require_once 'lock.php';  // verificando se o usuario esta logado, antes de deslogar


    unset($_SESSION); // retirando as informacoes de sessao
    session_destroy(); // sessao que foi iniciado e starta no momento do login sendo destruida
    header('location:index.php'); // redirecionando para index

    
?>