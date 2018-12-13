<?php session_start();

    if(isset($_SESSION['usuario'])){
        require 'frontend/Princ.php';
    }else{
        header ('location: login.php');
    }
        
?>