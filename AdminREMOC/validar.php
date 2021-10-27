<?php
    session_start();
    //include('CRUD/db.php');
    
    $usuario=$_POST['usuario'];
    $contra=$_POST['contra'];

    $cnn = mysqli_connect("localhost", "root" , "" , "db_remoc");

    $query = "SELECT CorreoAdmin, PassAdmin from administrador 
            where CorreoAdmin='$usuario' and PassAdmin='$contra'";
    $resultado=mysqli_query($cnn, $query);

    $filas=mysqli_num_rows($resultado);
    
    if ($filas>0) {
        $_SESSION['usuario'] = $usuario;
        header("Location:inicio.php");
    }else{
        header("Location:login.php");
    }

    //liberar resultados
    mysqli_free_result($resultado);

    //cerramos la conexion
    mysqli_close($cnn);

?>