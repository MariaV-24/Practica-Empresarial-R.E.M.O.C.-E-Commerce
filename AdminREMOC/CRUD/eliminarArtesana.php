<?php
    session_start();
    include('db.php');

    $rutaCarpeta = str_replace("\\","/",dirname(dirname(__FILE__)));
    $exploded = explode("/",$rutaCarpeta);
    array_pop($exploded);
    $ruta_final = implode("/",$exploded)."/images/imagenes/artesanas-oficial/";

    $ruta_final_producto = implode("/",$exploded)."/images/imagenes/products/";
    
    /* verificamos si existe el ID que vamos a eliminar */
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $imagen = $_GET['imagen'];

        //separa el nombre de la imagen de la ruta que se esta mandando 
        $exploded = explode("/",$imagen);      
        unlink($ruta_final. $exploded[3]);

        
        $query = "SELECT producto.IDProd, imagen_producto.Imagen
        
            FROM imagen_producto

            INNER JOIN producto
            ON producto.IDProd = imagen_producto.IDProd

            INNER JOIN artesana
            ON artesana.CodigoArtesana = producto.CodigoArtesana
            WHERE  producto.IDArtesana = $id"; 
        $resultado_Busqueda = mysqli_query($cnn, $query);

        //Obtenemos los ids de los productos relacionados al id artesana
        $ids = ""; 
        while($row = mysqli_fetch_array($resultado_Busqueda)){
            $exploded = explode("/",$row['Imagen']);
            unlink($ruta_final_producto. $exploded[3]);

            if ($ids == NULL) {
                $ids = "( ". $row['IDProd'];
            } else{
                $ids .= " , " . $row['IDProd'];
            }
        }

        if ($ids != NULL) {
            $ids .= " )";
        }


        $query = "DELETE from imagen_producto 
                where imagen_producto.IDProd in $ids";
        $resultado = mysqli_query($cnn, $query); 


        $query = "DELETE from producto 
                    where producto.IDArtesana = $id";
        $resultado = mysqli_query($cnn, $query); 


        $query = "DELETE from artesanas_imagen                
                    where artesanas_imagen.IDArtesana = $id";
        $resultado = mysqli_query($cnn, $query);


        $query = "DELETE from artesana 
                    where artesana.IDArtesana = $id";
        $resultado = mysqli_query($cnn, $query);



        /* comprobamos el resultado */
        if (!$resultado) {
            die(" Parece que algo a salido mal ");
        }

        $_SESSION["eliminarArtesana"] = true;
        
        header("Location: ../../AdminREMOC/listarArtesana.php");

    }

?>