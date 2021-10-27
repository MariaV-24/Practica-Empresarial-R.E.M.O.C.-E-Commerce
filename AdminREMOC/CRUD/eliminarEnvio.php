<?php
    session_start();
    include('db.php');

    //echo $_GET['id'];

    /* verificamos si existe el ID que vamos a eliminar */
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        
        $query = "DELETE from envios_producto 
                    where envios_producto.EnviosIDEnvio = $id";
        $resultado = mysqli_query($cnn, $query);  

        $query = "DELETE from envios              
                    where envios.IDEnvio = $id";
        $resultado = mysqli_query($cnn, $query);
        
        /* comprobamos el resultado */
        if (!$resultado) {
            die(" Parece que algo a salido mal ");
        }

        $_SESSION["elimEnvio"] = true;
        //echo "wiii";
        header("Location: ../../AdminREMOC/listarEnvio.php");

    }

?>