<?php
session_start();
    require('header.php');
    
    include('constantes.php');
?>

<!-- Carrucel -->
<?php
    require('seccion/carrucel.php');    
?>

<!-- Ultimos Productos -->
<?php
    require('seccion/ultimosProductos.php');
?>

<?php
    require('footer.php');
?>