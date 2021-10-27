<!-- Vista para agregar los productos al carrito -->
<?php
session_start();
/*Request recive por GET o POST */
    //si se le da clic al btn
    if (isset($_POST["agregar"])) {

        $prod = $_POST["prod"]; //id del producto
        $nom = $_POST["nombre"];
        $img = $_POST["img"];
        $precio = $_POST["precio"];
        
        //metemos los prods al carrito por medio de sesiones
        $_SESSION["carrito"][$nom]["prod"]= $prod;
        $_SESSION["carrito"][$nom]["nombre"]= $nom;
        $_SESSION["carrito"][$nom]["img"] = $img;
        $_SESSION["carrito"][$nom]["precio"]= $precio;


        header("Location: http://localhost:50/REMOC-CAMBIOS/productos.php?pagina=1");
    }

?>
