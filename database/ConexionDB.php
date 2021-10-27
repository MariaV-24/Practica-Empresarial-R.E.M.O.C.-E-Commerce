<?php

try {
    $cnn = new PDO('mysql:host=localhost;dbname=db_remoc', 'root', '');
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}






?>