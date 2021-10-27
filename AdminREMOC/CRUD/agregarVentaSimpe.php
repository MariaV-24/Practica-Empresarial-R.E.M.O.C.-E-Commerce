<?php
    session_start();
    include('db.php');

/*************************************************************************/

    if (isset($_POST['agregarVentaSimpe'])) {
        $idProd = $_POST["listaID"];
        $fechav = $_POST["fechav"];
        $totalv = $_POST["totalv"];
        $nombreClientev = $_POST["nombreClientev"];
        $direccionClientev = $_POST["direccionClientev"];
        $telefonoClientev = $_POST["telefonoClientev"];

        // var_dump($idProd);
        // echo "<br> fecha: " . $fechav;
        // echo "<br> Total " . $totalv;
        // echo "<br> nom: " . $nombreClientev;
        // echo "<br> direcc: " . $direccionClientev;
        // echo "<br> cel:" . $telefonoClientev;
        
        $query = "INSERT INTO ventas(TipoVenta, NombreCliente, DireccionCliente, TelefonoCliente, Fecha, Total)
        VALUES(1 ,'$nombreClientev', '$direccionClientev', '$telefonoClientev', '$fechav' , '$totalv')";

        $result = mysqli_query($cnn, $query);

        //obtenemos el id agregado y luego hacemos el insert
        $query = "SELECT IDVenta FROM ventas";
        $IDVenta = mysqli_insert_id($cnn);

        foreach ($idProd as $indice => $arreglo) {       
            $query = "INSERT INTO producto_ventas(ProductoIDProd, VentasIDVentas)
                VALUES('$arreglo', '$IDVenta')";
            $result = mysqli_query($cnn, $query);

            
            $query = "SELECT CantidadTotalP FROM producto
                where IDProd = $arreglo";
            $cantidadP = mysqli_query($cnn, $query);

            if (mysqli_num_rows($cantidadP) == 1) {
                $row = mysqli_fetch_array($cantidadP);
                
                $cant = $row['CantidadTotalP'];
            }

            $query = "UPDATE producto set CantidadTotalP = ('$cant'- 1)
                    where IDProd = $arreglo;
                    ";
            $result = mysqli_query($cnn, $query);
        }

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION["ventaSimpe"] = true;

        header("Location: ../../AdminREMOC/agregarVentaSimpe.php");

    }

?>