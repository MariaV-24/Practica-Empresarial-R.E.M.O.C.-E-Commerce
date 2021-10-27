<?php
include('AdminREMOC/CRUD/db.php');
        
if (isset($_GET['enviar'])) {

    $buscar = $_GET['buscar'];

    $query = ("SELECT * FROM producto WHERE NombreProd like '%$buscar%'");
    $result = mysqli_query($cnn, $query);

    if (!$result) {
        echo "buuuuuuuuuuuu";
    }


}
    





?>