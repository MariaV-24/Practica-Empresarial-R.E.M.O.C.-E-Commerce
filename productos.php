<?php
    session_start();
    require('funciones.php');
    require('headerr.php');
    
    include('constantes.php');
?>

<!-- contenedor de los productos -->
<?php
    require('seccion/contenedorProductos.php');
?>

<!-- PAGINACION -->
<?php
    require('paginacion.php');
?>

<?php
    require('footer.php');
?>