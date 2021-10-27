<?php
    //verificar si la session esta iniciada
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    include('db.php');

/*************************************************************************/

if (isset($_POST['agregarEnvio'])) {

    //$id = $_POST['id']; //id envio
    $fecha = $_POST['fecha'];
    $nomCliente = $_POST['nombreC'];
    $direccionCliente = $_POST['direccionC'];
    $telefonoCliente = $_POST['telefonoC'];
    // $nomProducto = $_POST['lista'];
    $idProd = $_POST['lista']; //IDProd
    $total = $_POST['total'];
    $codVenta = $_POST['cod'];

    // echo 'id='.$id . '<br>';
    // echo 'fecha='.$fecha . '<br>';
    // echo 'nombre cliente='.$nomCliente. '<br>';
    // echo 'Direc='.$direccionCliente. '<br>';
    // echo 'Telf='.$telefonoCliente. '<br>';
    // var_dump($idProd);
    // echo 'total='.$total. '<br>';
    // echo 'CodVenta='.$codVenta. '<br>';
    
    $query = "INSERT INTO envios(FechaEnvio, NombreCliE , DireccionCliE, TelefonoCliE, 
                                TotalE,IDVenta)
            VALUES('$fecha', '$nomCliente', '$direccionCliente', '$telefonoCliente',
                    '$total', '$codVenta')";

    $result = mysqli_query($cnn, $query);
    
    //obtenemos el id agregado y luego hacemos el insert
    $query = "SELECT IDEnvio FROM envios";
    $IDEnvio = mysqli_insert_id($cnn);

    //print_r('ultimo id'.$IDEnvio);

    foreach ($idProd as $key) {
        $query = "INSERT INTO envios_producto(EnviosIDEnvio, ProductoIDProd)
            VALUES('$IDEnvio', '$key')";
        $result = mysqli_query($cnn, $query);
    }
    
    if (!$result) {
        die("Parece que algo a salido mal");
    }

    $_SESSION["envio"] = true;
    /* Redireccionar la pagina al agregar */
    header("Location: ../../AdminREMOC/agregarEnvio.php");
    //echo "wiii";


}

?>