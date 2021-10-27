<!-- Vista para agregar los productos al carrito -->
<?php
session_start();
/*Request recive por GET o POST */
    //si se le da clic al btn
    if (isset($_REQUEST["agregar"])) {

        $prod = $_POST["prod"];
        $nom = $_REQUEST["nombre"];
        $img = $_REQUEST["img"];
        $precio = $_REQUEST["precio"];
        
        //metemos los prods al carrito por medio de sesiones
        $_SESSION["carrito"][$nom]["prod"]= $prod;
        $_SESSION["carrito"][$nom]["nombre"]= $nom;
        $_SESSION["carrito"][$nom]["img"] = $img;
        $_SESSION["carrito"][$nom]["precio"]= $precio;

        //print_r($_SESSION["carrito"]);
        //echo "<script>alert('Producto: $nom agregado correctamente');</script>";

        header("Location: /REMOC-CAMBIOS/");
    }

    //echo "Prod: $img , Nombre: $nom , Precio: $precio";
?>
