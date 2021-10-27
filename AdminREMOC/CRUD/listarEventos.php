<?php
    $query = "SELECT IDEvento, TituloEvento, 
                    DescripcionEvento , Ubicacion, FechaEvento 
            FROM evento
            order by IDEvento desc"; 
    $resultado_Eventos = mysqli_query($cnn, $query);


?>