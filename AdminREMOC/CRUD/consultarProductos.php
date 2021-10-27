<?php
include('db.php');
    /* verifico el boton que este defiidos */    
if (isset($_GET['enviar'])) {

    //obtengo la consulta
    $buscar = $_GET['buscar'];

    //la realizo
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

            WHERE producto.NombreProd like '%$buscar%'
            ORDER BY producto.IDProd desc";
    $result = mysqli_query($cnn, $query);
}

?>