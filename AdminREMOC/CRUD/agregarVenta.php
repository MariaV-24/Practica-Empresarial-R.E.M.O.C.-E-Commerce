<?php
    include('db.php');
    
//verificar si la session esta iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
    $name = $_GET["nombre"];
    $telefono = $_GET["telefono"];
    $direccion = $_GET["direccion"];
    $total = $_GET["monto"];

    $idProd = $_GET["idProdCarrito"];

    $query = "INSERT INTO ventas(NombreCliente , DireccionCliente, TelefonoCliente, Fecha, Total)
    VALUES('$name', '$direccion', '$telefono',NOW(), '$total')";

    $result = mysqli_query($cnn, $query);

    //obtenemos el id agregado y luego hacemos el insert
    $query = "SELECT IDVenta FROM ventas";
    $IDVenta = mysqli_insert_id($cnn);

    foreach ($idProd as $indice => $arreglo) {
    //foreach ($idProd as $key) {
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
    
    session_destroy();

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $_SESSION["notificacion"] = true;

    header("Location: ../../index.php");

?>