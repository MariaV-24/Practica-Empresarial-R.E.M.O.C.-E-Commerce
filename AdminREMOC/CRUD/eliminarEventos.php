<?php
    session_start();
    include('db.php');

    //echo $_GET['id'];

    /* verificamos si existe el ID que vamos a eliminar */
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $query = "DELETE from evento where IDEvento = $id";
        /*consulta*/
        $resultado = mysqli_query($cnn, $query);

        /* comprobamos el resultado */
        if (!$resultado) {
            die(" Parece que algo a salido mal ");
        }

        $_SESSION["eliminarEvento"] = true;
        header("Location: ../../AdminREMOC/ListarEventos.php");

    }



?>