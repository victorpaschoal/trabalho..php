<?php require_once 'lock.php'; 


    unset($_SESSION);
    session_destroy();
    header('location:index.php');

    
?>