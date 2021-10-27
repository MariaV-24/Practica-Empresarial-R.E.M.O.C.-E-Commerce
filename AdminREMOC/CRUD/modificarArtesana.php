<?php
    //verificar si la session esta iniciada
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    include("db.php");

    $rutaCarpeta = str_replace("\\","/",dirname(dirname(__FILE__)));
    $exploded = explode("/",$rutaCarpeta);
    array_pop($exploded);
    $ruta_final = implode("/",$exploded)."/images/imagenes/artesanas-oficial/";

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        
        $query = "SELECT artesana.IDArtesana, artesanas_imagen.Imagen, artesana.CodigoArtesana, 
                artesana.NombreArtesana, artesana.ApellidoArtesana
                from artesana 
                inner join artesanas_imagen
                on artesanas_imagen.IDArtesana = artesana.IDArtesana
                where artesana.IDArtesana = $id";

        $resultado_Busqueda = mysqli_query($cnn, $query);

        /* validacion por cuantos resultados encontramos*/
        if (mysqli_num_rows($resultado_Busqueda) == 1) {
            $row = mysqli_fetch_array($resultado_Busqueda);
            
            $id = $row['IDArtesana'];
            $codArtesana = $row['CodigoArtesana'];
            $nombreArtesana = $row['NombreArtesana'];
            $apellidoArtesana = $row['ApellidoArtesana'];

            $imagenArtesana = $row['Imagen'];
        }

        /* validamos si existe el btn agregar y obtenemos los datos */
        if (isset($_POST['modificarArtesana'])) {
            $id = $_GET['id'];

            //$imgActual = $_POST['imgArtes'];
            $imgActual = explode("/",$_POST['imgArtes2']);
            $nombreActual = end($imgActual);

            $codArtesana = $_POST['codArtesana'];
            $nomArtesana = $_POST['nomArtesana'];
            $apellidoArtesana = $_POST['apellidoArtesana'];
            
            $imagenArtesana = $_FILES['imgArtes']['name'];     
            $ubicac = $_FILES['imgArtes']['tmp_name'];
            $destino = $ruta_final . $imagenArtesana;      
            
            if (is_uploaded_file($_FILES['imgArtes']['tmp_name'])) {
                move_uploaded_file($ubicac, $destino);

                unlink($ruta_final. $nombreActual);

                $destino ="images/imagenes/artesanas-oficial/" . $imagenArtesana;
                $query = "UPDATE artesanas_imagen                   
                    set
                        Imagen = '$destino',
                        IDArtesana = '$id'

                    where IDArtesana = $id;
                    ";

                mysqli_query($cnn, $query);

            }

            $query = "UPDATE artesana                   
                    set
                    CodigoArtesana = '$codArtesana',
                    NombreArtesana = '$nomArtesana',
                    ApellidoArtesana = '$apellidoArtesana'

                    where IDArtesana = $id;
                    ";

            mysqli_query($cnn, $query); 
            
            $_SESSION["modifArtesana"] = true;

            //echo "LO QUE SEA, wiiiii";
            //header("Location: ../../AdminREMOC/listarArtesana.php");

            echo'<script type="text/javascript">
                window.location="/REMOC-CAMBIOS/AdminREMOC/listarArtesana.php";
                </script>';
        }

    }



?>