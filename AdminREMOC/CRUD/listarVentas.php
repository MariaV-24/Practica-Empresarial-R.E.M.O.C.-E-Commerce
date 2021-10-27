<?php
    $query = "SELECT * FROM producto_ventas

                inner join ventas
                on producto_ventas.VentasIDVentas = ventas.IDVenta

                inner join producto
                on producto_ventas.ProductoIDProd = producto.IDProd
                group by ventas.IDVenta
                ORDER BY ventas.IDVenta DESC";

    $resultado_ventas = mysqli_query($cnn, $query);


?>