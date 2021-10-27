<?php
include('db.php');
    /* verifico el boton que este defiidos */    
if (isset($_GET['enviar'])) {

    //obtengo la consulta
    $buscar = $_GET['buscar'];

    //la realizo
    $query = "SELECT artesanas_imagen.Imagen,artesana.IDArtesana, artesana.CodigoArtesana, 
                artesana.NombreArtesana, artesana.ApellidoArtesana, 
                (SELECT COUNT(*)FROM artesana where artesana.IDArtesana = artesana.IDArtesana)
                from artesana 
                inner join artesanas_imagen
                on artesanas_imagen.IDArtesana = artesana.IDArtesana
                WHERE CodigoArtesana like '%$buscar%' ";
    $result = mysqli_query($cnn, $query);
}

?>