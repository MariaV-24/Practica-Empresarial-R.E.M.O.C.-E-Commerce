<?php
    session_start();    
    include('db.php');
    
/*************************************************************************/

    if (isset($_POST['agregarArtesana'])) {
        $codArtesana = $_POST['codArtesana'];
        $nomArtesana = $_POST['nomArtesana'];
        $apellidoArtesana = $_POST['apellidoArtesana'];

         // todo lo relacionado con la imagen
        $imagenAr = $_FILES['imgArtes']['name'];     
        $ubicac = $_FILES['imgArtes']['tmp_name'];
        $destinoo="../../images/imagenes/artesanas-oficial/" . $imagenAr;
        //copy($ubicac,$destino);
        //move_uploaded_file($ubicac, $destino);

        $query = "INSERT INTO artesana(CodigoArtesana, NombreArtesana, ApellidoArtesana)
                VALUES('$codArtesana', '$nomArtesana', '$apellidoArtesana')";
        $result = mysqli_query($cnn, $query);

        //obtenemos el id agregado y luego hacemos el insert
        $query = "SELECT IDArtesana FROM artesana";
        $IDArtes = mysqli_insert_id($cnn);

        $destino="images/imagenes/artesanas-oficial/" . $imagenAr;
        
        $query = "INSERT INTO artesanas_imagen(Imagen , IDArtesana)                   
                    VALUES('$destino', '$IDArtes')";
        $result = mysqli_query($cnn, $query);

        if (!$result) {
            $_SESSION["error"] = true;
        }
        else {
            $_SESSION["artesana"] = true;
            move_uploaded_file($ubicac, $destinoo);
        }
        //echo 'pos si ';
        /* Redireccionar la pagina al agregar */
        echo'<script type="text/javascript">
                window.location="/REMOC-CAMBIOS/AdminREMOC/agregarArtesana.php";
            </script>';


    }




?>