<?php
    //verificar si la session esta iniciada
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    } 
    
    include("db.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        
        $query = "SELECT * FROM envios_producto
                inner join envios
                on envios_producto.EnviosIDEnvio = envios.IDEnvio

                inner join producto
                on envios_producto.ProductoIDProd = producto.IDProd
                WHERE envios.IDEnvio = $id"; 

        $resultado_Busqueda = mysqli_query($cnn, $query);
        $prods = array();
        
        /* validacion por cuantos resultados encontramos*/
        // if (mysqli_num_rows($resultado_Busqueda) > 0 ) {
            //$row = mysqli_fetch_array($resultado_Busqueda);

            while($row = mysqli_fetch_array($resultado_Busqueda)){
                array_push($prods, $row);
            }
            //print_r($prods);
        //}
        

        /* validamos si existe el btn agregar y obtenemos los datos */
        if (isset($_POST['ModificarEnvio'])) {
            $id = $_GET['id'];
            
            $idV = $_POST['idVenta'];
            $fecha = $_POST['fecha'];
            $nombre = $_POST['nombreC'];
            $direccion = $_POST['direccionC'];
            $telefono = $_POST['telefonoC'];

            $query = "UPDATE envios set FechaEnvio = '$fecha', 
                                        NombreCliE = '$nombre', 
                                        DireccionCliE = '$direccion',
                                        TelefonoCliE = '$telefono'
                    where IDEnvio = $id;
                    ";
            mysqli_query($cnn, $query); 

            $query = "UPDATE ventas set NombreCliente = '$nombre', 
                                        DireccionCliente = '$direccion', 
                                        TelefonoCliente = '$telefono'
                    where IDVenta = $idV;
                    ";
            mysqli_query($cnn, $query);
            
            //echo "wiiiii";
            $_SESSION["modEnvio"] = true;

            echo'<script type="text/javascript">
                window.location="/REMOC-CAMBIOS/AdminREMOC/listarEnvio.php";
                </script>';
        }

    }





?>