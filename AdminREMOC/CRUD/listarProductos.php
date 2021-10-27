
<?php
    $query = "SELECT 
               producto.NombreProd,
               producto.Size,
                producto.IDProd,
                producto.Precio,
                producto.CantidadTotalP,
                producto.Categoria,

                imagen_producto.Imagen, 

                artesana.CodigoArtesana

            FROM imagen_producto

            INNER JOIN producto
            ON producto.IDProd = imagen_producto.IDProd

            INNER JOIN artesana
            ON artesana.CodigoArtesana = producto.CodigoArtesana

            ORDER BY producto.IDProd DESC;
            "; 
    $resultado_productos = mysqli_query($cnn, $query);
?>
