<?php
include('db.php');
    /* verifico el boton que este defiidos */    
if (isset($_GET['enviar'])) {

    //obtengo la consulta
    $buscar = $_GET['buscar'];

    //la realizo
    $query = "SELECT IDEvento, TituloEvento, DescripcionEvento,
                    Ubicacion,FechaEvento 
                FROM evento 
                WHERE TituloEvento like '%$buscar%'";
    $result = mysqli_query($cnn, $query);
}

?>