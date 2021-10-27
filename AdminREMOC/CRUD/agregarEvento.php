<?php
session_start();
    include('db.php');
/* Comprobacion sencilla para ver si esta recibiendo los datos en gene */
    // if (isset($_POST['agregarEvento'])) {
    //     echo "Wiiii";
    // }
/*************************************************************************/

    if (isset($_POST['agregarEvento'])) {
        $titulo = $_POST['titulo'];
        $descripcion = $_POST['descripcion'];
        $ubicacion = $_POST['ubicacion'];
        $fecha = $_POST['fecha'];
        
        
        /* ---verificacion de cd dato--- */
        // echo $titulo . '<br>'; 
        // echo $descripcion . '<br>';
        // echo $ubicacion . '<br>';
        // echo $fecha . '<br>';

        $query = "INSERT INTO evento(TituloEvento, DescripcionEvento , Ubicacion, FechaEvento) 
        VALUES('$titulo', '$descripcion', '$ubicacion', '$fecha')";
        $result = mysqli_query($cnn, $query);

        if (!$result) {
            die("Parece que algo a salido mal");
        }

        $_SESSION["evento"] = true;

        /* Redireccionar la pagina al agregar */
        header("Location: ../../AdminREMOC/agregarEventos.php");
    }

?>