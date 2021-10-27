<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">

    <title>REMOC</title>
    <link rel="preload" href="css/normalize.css" as="style">
    <link rel="stylesheet" href="css/normalize.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" />

    <!-- BOOSTRAP -->
    <Script src="js/jquery.js"></Script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css.map" rel="stylesheet">
    <script src="js/bootstrap.js"></script>

    <!-- Prefetch -->
    <!-- Carga la 2da mas importante -->
    <link rel="prefetch" href="Contactenos.html" as="document">

    <link rel="preload" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Krub:wght@400;700&display=swap" rel="stylesheet">

    <link rel="preload" href="css/style.css" as="style">
    <!--carga la hoja rapido-->
    <link rel="stylesheet" href="css/style.css">

    <!-- <link rel="stylesheet" href="js/script.js"> -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <?php
        require('funciones.php');
    ?>
</head>

<body>
    <header class="header">
        <a class="Logo" href="index.php">
            <img class="x1" loading="lazy" src="images/logos/l2.png" alt="">
            <img class="x2" loading="lazy" src="images/logos/l1.png" alt="">
        </a>

        <div class="barra">
            <p><strong>+506 2445-4885</strong></p>
        </div>
    </header>

    <nav class="navbar navbar-expand-md nav-background arriba" style="height:60px">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Menú">
            <span class="navbar-toggler-icon">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd">
                    </path>
                </svg>
            </span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="nav-background navegacion-principal">
                <nav class="navegacion-principal">
                    <a href="index.php" class="link">Inicio</a>
                    <a href="Historia.php" class="link">Historia</a>
                    <a href="productos.php?pagina=1" class="link">Productos</a>
                    <a href="Artesanas.php?pagina=1" class="link">Artesanas</a>
                    <a href="eventos.php" class="link">Eventos</a>
                    <a href="Contactenos.php" class="link">Contactenos</a>

                    <a href="carrito.php" class="link">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart "
                            width="36" height="36" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <circle cx="6" cy="19" r="2" />
                            <circle cx="17" cy="19" r="2" />
                            <path d="M17 17h-11v-14h-2" />
                            <path d="M6 5l14 1l-1 7h-13" />
                        </svg>
                    </a>
            </div>
        </div>
    </nav>

    <?php if (isset($_SESSION["notificacion"]) && $_SESSION["notificacion"]) {?>
        
        <div class="container d-flex justify-content-center"> <button id="aviso" class="btn btn-danger "
                data-toggle="modal" data-target="#my-aviso" style="display: none;">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="20" height="20"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="#fff" fill="none" stroke-linecap="round"
                    stroke-linejoin="round" style="float: left;">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <line x1="4" y1="7" x2="20" y2="7" />
                    <line x1="10" y1="11" x2="10" y2="17" />
                    <line x1="14" y1="11" x2="14" y2="17" />
                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                </svg>
                Confirmacion de Pago</button>
            <div id="my-aviso" class="modal fade" tabindex="-1" role="dialog"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content border-0">
                        <div class="modal-body p-0">
                            <div class="card border-0 p-sm-3 p-2 justify-content-center">
                                <div class="card-header pb-0 bg-white border-0 ">
                                    <div class="row">
                                        <div class="col ml-auto"><button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close"> <span aria-hidden="true">&times;</span>
                                            </button></div>
                                    </div>
                                    <p class="font-weight-bold mb-2"> Pago Realizado Correctamente </p>
                                </div>
                                <div class="card-body px-sm-4 mb-2 pt-1 pb-0">
                                    <div class="row justify-content-end no-gutters">
                                        <div class="col-auto" style="margin-right: 8px;"><button type="button" class="btn btn-danger btn-sm"
                                                data-dismiss="modal">Cancel</button></div>
                                        
                                        <div class="col-auto">
                                            <button type="button" class="btn btn-danger btn-sm"
                                                data-dismiss="modal">Aceptar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            $('#aviso').click();
        </script>

    <?php

    unset($_SESSION["notificacion"]);

}?>









    <!-- Imagen opaca -->
    <section class="hero">
        <div class="contenido-hero">
            <h2>Red de Micro Productoras de Occidente</h2>
            <a class="boton" href="Contactenos.php" style="text-decoration:none; color: #fff;">Contactenos</a>
        </div>
    </section>


    <!-- Seccion Principal -->
    <main class="contenedor">