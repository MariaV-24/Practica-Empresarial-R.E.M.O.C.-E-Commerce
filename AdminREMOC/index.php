<?php
    session_start();
    //ya q index es lo primero q carga, debemos verificar que exista una session 
    if (isset($_SESSION['usuario'])) {
        //si existe la sesion, redirige
        header('Location: inicio.php');
    }
    else{
        //si no debe iniciarla
        header('Location: login.php');
    }
?>