<?php 
session_start();

if (
    !isset($_SESSION['usuario']) || 
    !isset($_SESSION['senha']) ||
    !isset($_SESSION['id'])
) {
    header('location:index.php?codigo=1');
    exit;
}
?>