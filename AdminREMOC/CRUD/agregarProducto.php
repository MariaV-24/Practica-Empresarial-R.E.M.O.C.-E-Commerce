<?php
    session_start();
    include('db.php');
/*************************************************************************/
    
    if (isset($_POST['agregarProducto'])) {
        $codArtesana = $_POST['codArtesana'];
        $nombreP = $_POST['nombreP'];
        $size = $_POST['size'];
        $cantidadP = $_POST['cantidadP'];
        $categoria = $_POST['categoria'];
        $precio = $_POST['precio'];
        $idArtesana = $_POST['idArtesana'];

        // todo lo relacionado con la imagen
        $imagenProd = $_FILES['imagenProd']['name'];     
        $ubicac = $_FILES['imagenProd']['tmp_name'];
        $destino="../../images/imagenes/products/" . $imagenProd;
        //copy($ubicac,$destino);
        move_uploaded_file($ubicac, $destino);

        $query = "INSERT INTO producto(CodigoArtesana, NombreProd, Size ,CantidadTotalP, Categoria, Precio, IDArtesana) 
                    VALUES('$codArtesana', '$nombreP', '$size' ,'$cantidadP','$categoria', '$precio', '$idArtesana')";               
        $result = mysqli_query($cnn, $query);

        // echo "insert prod ".$query . "<br><br>";


        // //obtenemos el id agregado y luego hacemos el insert
        $query = "SELECT IDProd FROM producto";
        $IDProd = mysqli_insert_id($cnn); 
        // echo "select id prod ".$IDProd. "<br><br>";
        
        $destino ="images/imagenes/products/" . $imagenProd;
        
        $query = "INSERT INTO imagen_producto(Imagen , IDProd) 
                    VALUES('$destino', '$IDProd')";  
        $result = mysqli_query($cnn, $query);
        // echo "insert img prod ".$query. "<br><br>";


        if (!$result) {
            die("Parece que algo a salido mal");
        }
        
        $_SESSION["msj"] = true;
        /* Redireccionar la pagina al agregar */
        header("Location: ../../AdminREMOC/agregarProductos.php");

    }



?>