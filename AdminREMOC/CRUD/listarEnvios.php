<?php
    $query = "SELECT * FROM envios_producto
    
                inner join envios
                on envios_producto.EnviosIDEnvio = envios.IDEnvio

                inner join producto
                on envios_producto.ProductoIDProd = producto.IDProd
                group by envios.IDEnvio
                ORDER BY envios.IDEnvio DESC
            "; 
    $resultado_Envio = mysqli_query($cnn, $query);

?>