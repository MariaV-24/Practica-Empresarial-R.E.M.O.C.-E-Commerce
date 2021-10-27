<?php
include('db.php');
    /* verifico el boton que este defiidos */    
if (isset($_GET['enviar'])) {

    //obtengo la consulta
    $buscar = $_GET['buscar'];

    //la realizo
    $query = "SELECT * FROM producto_ventas

                inner join ventas
                on producto_ventas.VentasIDVentas = ventas.IDVenta

                inner join producto
                on producto_ventas.ProductoIDProd = producto.IDProd
                WHERE NombreCliente like '%$buscar%'
                group by ventas.IDVenta 
                order by ventas.IDVenta desc";

    $result = mysqli_query($cnn, $query);
}

?>