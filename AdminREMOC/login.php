<?php
    session_start();

    if (isset($_SESSION['usuario'])) {
        header('Location: index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
</head>

<body>

    <div class="LoginHero">
        <div class="wave">
            <br><br><br>

            <div class="LogContenido-hero arriba">
                <div>
                    <form class="LogContenedor" action="validar.php" method="POST">
                        <br>
                        <h2>Bienvenida</h2>
                        <br>

                        <div class="container3">
                            <label for="uname"><b>Usuario</b></label>
                            <input type="text" name="usuario" required>                       
                        </div>
                        <div class="container3">                           
                            <label for="psw"><b>Contraseña</b></label>
                            <input type="password" name="contra" required>                        
                        </div>

                        <br><br>
                        <input class="boton margen" type="submit" value="Ingresar">
                        
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</body>

</html>