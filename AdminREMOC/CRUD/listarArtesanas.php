<?php
    $query = "SELECT artesana.IDArtesana, artesanas_imagen.Imagen, artesana.CodigoArtesana, 
                    artesana.NombreArtesana, artesana.ApellidoArtesana 
            from artesanas_imagen
            inner join artesana
            on artesanas_imagen.IDArtesana = artesana.IDArtesana
            where artesanas_imagen.IDImagenArtesana != 0
            order by artesana.IDArtesana desc"; 
            
            
    $resultado_artesana = mysqli_query($cnn, $query);


?>