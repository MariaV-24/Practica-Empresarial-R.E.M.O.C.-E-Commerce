<?php
include('db.php');
    /* verifico el boton que este defiidos */    
if (isset($_GET['enviar'])) {

    //obtengo la consulta
    $buscar = $_GET['buscar'];

    //la realizo
    $query = "SELECT * FROM envios_producto
            inner join envios
            on envios_producto.EnviosIDEnvio = envios.IDEnvio

            inner join producto
            on envios_producto.ProductoIDProd = producto.IDProd
            WHERE NombreCliE like '%$buscar%'
            group by envios.IDEnvio               
            ";
    $result = mysqli_query($cnn, $query);
}

?>