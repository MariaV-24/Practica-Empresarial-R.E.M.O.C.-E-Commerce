<?php

    include("db.php");
    
    $rutaCarpeta = str_replace("\\","/",dirname(dirname(__FILE__)));
    $exploded = explode("/",$rutaCarpeta);
    array_pop($exploded);
    $ruta_final = implode("/",$exploded)."/images/imagenes/products/";

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        
        $query = "SELECT 
                    producto.NombreProd,
                    producto.Size,
                    producto.IDProd,
                    producto.Precio,
                    producto.CantidadTotalP,
                    producto.Categoria,

                    imagen_producto.IDProd, 
                    imagen_producto.Imagen, 

                    artesana.CodigoArtesana

                FROM imagen_producto

                INNER JOIN producto
                ON producto.IDProd = imagen_producto.IDProd

                INNER JOIN artesana
                ON artesana.CodigoArtesana = producto.CodigoArtesana
                WHERE  producto.IDProd = $id"; 

        $resultado_Busqueda = mysqli_query($cnn, $query);

        /* validacion por cuantos resultados encontramos*/
        if (mysqli_num_rows($resultado_Busqueda) == 1) {
            $row = mysqli_fetch_array($resultado_Busqueda);
            
            $id = $row['IDProd'];
            $codArtesana = $row['CodigoArtesana'];
            $nombreP = $row['NombreProd'];
            $size = $row['Size'];
            $cantidadP = $row['CantidadTotalP'];
            $categoria = $row['Categoria'];
            $precio = $row['Precio'];
            
            $imagenProd = $row['Imagen'];
        }



        /* validamos si existe el btn agregar y obtenemos los datos */
        if (isset($_POST['agregar'])) {
            $id = $_GET['id'];

            $imgActual = explode("/",$_POST['imagenProd2']);
            $nombreActual = end($imgActual);

            $codArtesana = $_POST['codArtesana'];
            $nombreP = $_POST['nombreP'];
            $size = $_POST['size'];
            $cantidadP = $_POST['cantidadP'];
            $categoria = $_POST['categoria'];
            $precio = $_POST['precio'];
            
            $imagenProd = $_FILES['imagenProd']['name'];     
            $ubicac = $_FILES['imagenProd']['tmp_name'];
            
            $destino = $ruta_final . $imagenProd;  
            
            //verifica si esta declarado, si no viene vacio y si viene cn algo se hace lo de adentro
            if (is_uploaded_file($_FILES['imagenProd']['tmp_name'])) {
                move_uploaded_file($ubicac, $destino);
                
                unlink($ruta_final. $nombreActual);
                

                $destino ="images/imagenes/products/" . $imagenProd;
                $query = "UPDATE imagen_producto                   
                        set
                            Imagen = '$destino',
                            IDProd = '$id'
    
                        where IDProd = $id;
                        ";
    
                mysqli_query($cnn, $query);
            }


            $query = "UPDATE producto                   
                    set
                        NombreProd = '$nombreP',
                        Size = '$size',
                        Precio = '$precio',
                        CantidadTotalP = '$cantidadP',
                        CodigoArtesana = '$codArtesana',
                        Categoria = '$categoria'

                    where IDProd = $id;
                    ";

            mysqli_query($cnn, $query); 
            
            $_SESSION["msj"] = true;

            echo'<script type="text/javascript">
                window.location="/REMOC-CAMBIOS/AdminREMOC/listarProductos.php";
                </script>';
        }

    }



?>