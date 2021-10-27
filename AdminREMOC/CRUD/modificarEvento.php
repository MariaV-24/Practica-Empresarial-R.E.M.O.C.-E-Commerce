<?php

    include("db.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        
        $query = "SELECT IDEvento, TituloEvento, DescripcionEvento, 
                        Ubicacion, FechaEvento 
                FROM evento
                WHERE IDEvento = $id"; 

        $resultado_Busqueda = mysqli_query($cnn, $query);

        /* validacion por cuantos resultados encontramos*/
        if (mysqli_num_rows($resultado_Busqueda) == 1) {
            $row = mysqli_fetch_array($resultado_Busqueda);
            
            $id = $row['IDEvento'];
            $titulo = $row['TituloEvento'];
            $descripcion = $row['DescripcionEvento'];
            $ubicacion = $row['Ubicacion'];
            $fecha = $row['FechaEvento'];
        }

        /* validamos si existe el btn agregar y obtenemos los datos */
        if (isset($_POST['agregar'])) {
            $id = $_GET['id'];

            $titulo = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];
            $ubicacion = $_POST['ubicacion'];
            $fecha = $_POST['fecha'];

            $query = "UPDATE evento set TituloEvento = '$titulo', 
                                        DescripcionEvento = '$descripcion', 
                                        Ubicacion = '$ubicacion',
                                        FechaEvento = '$fecha'
                    where IDEvento = $id;
                    ";
            mysqli_query($cnn, $query); 
            
            $_SESSION["modEvento"] = true;

            echo'<script type="text/javascript">
                window.location="/REMOC-CAMBIOS/AdminREMOC/ListarEventos.php";
                </script>';
        }

    }





?>