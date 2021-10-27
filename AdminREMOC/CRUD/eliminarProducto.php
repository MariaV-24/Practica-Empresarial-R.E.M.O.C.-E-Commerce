<?php
    session_start();
    include('db.php');

    $rutaCarpeta = str_replace("\\","/",dirname(dirname(__FILE__)));
    $exploded = explode("/",$rutaCarpeta);
    array_pop($exploded);
    $ruta_final = implode("/",$exploded)."/images/imagenes/products/";

    /* verificamos si existe el ID que vamos a eliminar */
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $imagen = $_GET['imagen'];

        //separa el nombre de la imagen de la ruta que se esta mandando 
        $exploded = explode("/",$imagen);      
        unlink($ruta_final. $exploded[3]);


        $query = "DELETE from imagen_producto                
                    where imagen_producto.IDProd = $id";
        $resultado = mysqli_query($cnn, $query);

        $query = "DELETE from producto 
                    where producto.IDProd = $id";
        $resultado = mysqli_query($cnn, $query);      
        
        /* comprobamos el resultado */
        if (!$resultado) {
            die(" Parece que algo a salido mal ");
        }

        $_SESSION["msj_eliminado"] = true;

        header("Location: ../listarProductos.php");

    }

?>