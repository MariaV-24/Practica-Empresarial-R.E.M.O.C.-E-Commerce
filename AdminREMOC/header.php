<?php
    session_start();
    if (!isset($_SESSION['usuario'])) {
        header('Location: index.php');
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Administracion REMOC</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link rel="stylesheet" href="css/style2.css">
    <!-- ESTILOS PARA PODER EDITAR ADMIN -->
    <style>
        [class*="sidebar-dark-"] {
            background-color: #b83242;
        }

        .card-primary:not(.card-outline)>.card-header {
            background-color: #000;
        }

        .card-secondary:not(.card-outline)>.card-header {
            background-color: #000;
        }

        .btn-success {
            color: #fff;
            background-color: #17a2b1;
            border-color: #17a2b1;
            box-shadow: none;
        }

        .btn-success:hover {
            color: #fff;
            background-color: #1eb7b8;
            border-color: #1eb7b8;
        }

        .btn-secondary {
            color: #fff;
            background-color: #b83242;
            border-color: #b83242;
            box-shadow: none;
        }

        .btn-secondary:hover {
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545;
        }

        /**************************************************************/
        @media (min-width: 340px) {
            .remocPic {
                width: 250px;
                height: 100px;

                margin-left: 20px;
                margin-right: 50px;

                margin-top: 10px;
                margin-bottom: 10px;
            }

            .foot {
                margin-top: 250px;
            }
        }

        @media (min-width: 430px) {
            .remocPic {
                width: 350px;
                height: 130px;

                margin-left: 20px;
                margin-right: 10px;

                margin-top: 100px;
            }

            .foot {
                margin-top: 170px;
            }
        }

        @media (min-width: 580px) {
            .remocPic {
                width: 400px;
                height: 300px;

                margin-top: 10px;
                margin-bottom: 50px;

                margin-left: 20px;
                margin-right: 50px;
            }



            .foot {
                margin-top: 50px;
            }
        }


        @media (min-width: 768px) {
            .remocPic {
                width: 800px;
                height: 450px;

                margin-top: 80px;

                margin-left: 100px;
                margin-right: 500px;
            }

            .foot {
                margin-top: 200px;
            }
        }

        @media (min-width: 1150px) {
            .remocPic {
                width: 800px;
                height: 400px;

                margin-top: 50px;
                margin-bottom: 50px;

                margin-left: 310px;
                margin-right: 600px;
            }

            .foot {
                margin-top: 40px;
            }
        }

        @media (min-width: 1250px) {
            .remocPic {
                width: 1100px;
                height: 400px;

                margin-top: 100px;
                margin-bottom: 50px;

                margin-left: 350px;
            }



            .foot {
                margin-top: 50px;
            }
        }

    </style>

</head>

<!-- AJAX PARA TABLA ENVIOS -->
<script type="text/javascript">
    function consulta(item) {
        var idSelect = jQuery(item).children(":selected").attr("value");

        console.log(idSelect);

        if (idSelect > 0) {
            $.ajax({
                type: 'POST',
                url: 'crud/dbcon.php',
                data: {
                    opcion: 'consulta',
                    id: idSelect
                },
                cache: false,
                success: function(response, textStatus, XMLHttpRequest) {
                    var result = JSON.parse(response);
                    $('#lista').empty();

                    for (var i = 0; i < result.res.length; i++) {
                        $('#idProd').val(result.res[0].IDProd);
                        $('#codigo').val(result.res[0].IDVenta);
                        $("#nombreC").val(result.res[0].NombreCliente);
                        $("#telefonoC").val(result.res[0].TelefonoCliente);
                        $("#direccionC").val(result.res[0].DireccionCliente);
                        $("#total").val(result.res[0].Total);
                        $("#lista").append('<li><a>' + result.res[i].IDProd + '</a>  <a>-' + result.res[i]
                            .NombreProd + '</a></li>');

                        //   ID Prod Para tabla muchos a muchos              
                        $("#autollenar").append('<input name="lista[]" type="hidden" value="' + result.res[i]
                            .IDProd + '"></input>');
                        console.log(result.res);
                    }
                },
                error: function(xhr, type, exception) {
                    $("#idProd").val("");
                    $("#codigo").val("");
                    $("#nombreC").val("");
                    $("#telefonoC").val("");
                    $("#direccionC").val("");
                    $("#nombreProd").val("");
                    $("#total").val("");
                    $('#lista').empty();
                    alert("Error Ajax" + xhr);

                    console.log(exception);
                    console.log(type);
                }
            });
        } else {
            console.log("else");
            $("#idProd").val("");
            $("#codigo").val("");
            $("#nombreC").val("");
            $("#telefonoC").val("");
            $("#direccionC").val("");
            $("#nombreProd").val("");
            $("#total").val("");
            $('#lista').empty();
        }
    };
</script>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->


        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="inicio.php" class="brand-link">
                <img src="dist/img/images/logos/logo2.jpg" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light"><strong>REMOC</strong></span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel">
                    <div class="info">
                        <a class="d-block" style="margin-left: 30px;"><strong>Inicio de la Pagina</strong></a>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- PRODUCTOS -->
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-cog"></i>
                                <p>
                                    Productos
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="agregarProductos.php" class="nav-link" style="margin-left: 30px;">
                                        <i class="fas fa-plus nav-icon"></i>
                                        <p>Agregar</p>
                                    </a>
                                </li>

                                <!-- <li class="nav-item">
                                    <a href="ModificarProductos.php" class="nav-link" style="margin-left: 30px;">
                                        <i class="far fa-edit nav-icon"></i>
                                        <p>Modificar</p>
                                    </a>
                                </li> -->

                                <li class="nav-item">
                                    <a href="listarProductos.php" class="nav-link" style="margin-left: 30px;">
                                        <i class="fas fa-list nav-icon"></i>
                                        <p>Listar</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- ************************************************************************************************************************************* -->

                        <!-- ARTESANAS -->
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-cog"></i>
                                <p>
                                    Artesanas
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="agregarArtesana.php" class="nav-link" style="margin-left: 30px;">
                                        <i class="fas fa-plus nav-icon"></i>
                                        <p>Agregar</p>
                                    </a>
                                </li>

                                <!-- <li class="nav-item">
                                    <a href="ModificarArtesana.php" class="nav-link" style="margin-left: 30px;">
                                        <i class="far fa-edit nav-icon"></i>
                                        <p>Modificar</p>
                                    </a>
                                </li> -->

                                <li class="nav-item">
                                    <a href="listarArtesana.php" class="nav-link" style="margin-left: 30px;">
                                        <i class="fas fa-list nav-icon"></i>
                                        <p>Listar</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- ************************************************************************************************************************************* -->

                        <!-- EVENTOS -->
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link user-panel">
                                <i class="nav-icon fas fa-cog"></i>
                                <p>
                                    Eventos
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="agregarEventos.php" class="nav-link" style="margin-left: 30px;">
                                        <i class="fas fa-plus nav-icon"></i>
                                        <p>Agregar</p>
                                    </a>
                                </li>

                                <!-- <li class="nav-item">
                                    <a href="ModificarEventos.php" class="nav-link" style="margin-left: 30px;">
                                        <i class="far fa-edit nav-icon"></i>
                                        <p>Modificar</p>
                                    </a>
                                </li> -->

                                <li class="nav-item">
                                    <a href="listarEventos.php" class="nav-link" style="margin-left: 30px;">
                                        <i class="fas fa-list nav-icon"></i>
                                        <p>Listar</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- ************************************************************************************************************************************* -->

                        <!-- SECCION DE ENVIOS -->
                        <div class="user-panel">
                            <div class="info">
                                <a class="d-block" style="margin-left: 30px;"><strong>Seccion de Envios</strong></a>
                            </div>
                        </div>
                        <nav class="mt-2">
                            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                                data-accordion="false">

                                <!-- ENVIOS -->
                                <li class="nav-item has-treeview">
                                    <a href="#" class="nav-link user-panel">
                                        <i class="nav-icon fas fa-cog"></i>
                                        <p>
                                            Envios
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>

                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="agregarEnvio.php" class="nav-link" style="margin-left: 30px;">
                                                <i class="fas fa-plus nav-icon"></i>
                                                <p>Agregar</p>
                                            </a>
                                        </li>

                                        <!-- <li class="nav-item">
                                                <a href="ModificarEnvios.php" class="nav-link" style="margin-left: 30px;">
                                                    <i class="far fa-edit nav-icon"></i>
                                                    <p>Modificar</p>
                                                </a>
                                            </li> -->

                                        <li class="nav-item">
                                            <a href="listarEnvio.php" class="nav-link" style="margin-left: 30px;">
                                                <i class="fas fa-list nav-icon"></i>
                                                <p>Listar</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                            </ul>
                        </nav>

                        <!-- ************************************************************************************************************************************* -->


                        <!-- SECCION DE VENTAS -->
                        <div class="user-panel">
                            <div class="info">
                                <a class="d-block" style="margin-left: 30px;"><strong>Seccion de Ventas</strong></a>
                            </div>
                        </div>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-cog"></i>
                                <p>
                                    Ventas
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>

                            <ul class="nav nav-treeview">
                                <!-- VENTAS -->
                                <li class="nav-item">
                                    <a href="agregarVentaSimpe.php" class="nav-link" style="margin-left: 30px;">
                                    <i class="fas fa-plus nav-icon"></i>
                                        <p>Agregar</p>
                                    </a>
                                </li>
                                
                                <!-- <li class="nav-item user-panel">
                                    <a href="listarVentaSINPE.php" class="nav-link" style="margin-left: 30px;">
                                        <i class="fas fa-list nav-icon"></i>
                                        <p>Lista SINPE</p>
                                    </a>
                                </li>  -->

                                <li class="nav-item">
                                    <a href="ListarVentas.php" class="nav-link" style="margin-left: 30px;">
                                        <i class="fas fa-list nav-icon"></i>
                                        <p>Listar </p>
                                    </a>
                                </li>
                            </ul>
                        </li>


                        <!-- CERRAR SESION -->
                        <div class="" style="margin-left: 85px;">
                            <nav class="mt-2">
                                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                                    data-accordion="false">
                                    <!-- VENTAS -->
                                    <li class="nav-item has-treeview">
                                        <a href="cerrar_sesion.php" class="nav-link">
                                            <p>
                                                <strong>Cerrar Sesion</strong>
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-logout"
                                                    style="margin-left: 5px;" width="25" height="25" viewBox="0 0 24 24"
                                                    stroke-width="2" stroke="#FFF" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                                                    <path d="M7 12h14l-3 -3m0 6l3 -3" />
                                                </svg>
                                            </p>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->

            </div>
            <!-- /.sidebar -->

        </aside>
    </div>
</body>