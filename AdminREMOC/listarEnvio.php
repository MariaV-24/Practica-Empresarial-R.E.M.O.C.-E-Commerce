<?php
    require("header.php");
    include("CRUD/db.php");
?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Listar Envio</h1>
                </div><!-- /.col -->

                <!-- SEARCH FORM -->
                <form action="consultarEnvio.php" method="get" class="form-inline ml-3">
                    <div class="input-group input-group-sm">
                        <input class="" type="search" name="buscar" placeholder="Nombre del Cliente"
                            aria-label="Search">
                        <!-- btn buscar -->
                        <input type="submit" name="enviar" value="Buscar">
                    </div>
                </form>

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"></h3>

                <!-- msj al modificar -->
                <div class="alert alert-success alert-dismissible fade show" style="<?php 
                        if (!isset($_SESSION["modEnvio"])) {
                            echo "display:none";
                        }

                        ?>" role="alert">
                    <strong>Envio Modificado Correctamente</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> 

                <!-- msj al eliminar -->
                <div class="alert alert-success alert-dismissible fade show" style="<?php 
                        if (!isset($_SESSION["elimEnvio"])) {
                            echo "display:none";
                        }

                        ?>" role="alert">
                    <strong>Envio Eliminado Correctamente</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                        title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>

            <div class="card-body p-0">
                <div>
                <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th style="width: 1%">
                                    #
                                </th>
                                <th style="width:8%">
                                    Codigo de Venta
                                </th>

                                <th style="width: 10%">
                                    Fecha del Envio
                                </th>

                                <th style="width: 15%">
                                    Nombre del Cliente
                                </th>

                                <th style="width: 15%">
                                    Direccion del Cliente
                                </th>

                                <th style="width: 15%">
                                    Telefono del Cliente
                                </th>

                                <th style="width: 15%">
                                    Nombre de los Productos
                                </th>

                                <th style="width: 10%">
                                    Total Pagado
                                </th>

                                <th style="width: 100%" class="text-center">
                                    Accion
                                </th>

                            </tr>
                        </thead>

                        <tbody>
                            <?php
                        require('CRUD/listarEnvios.php');

                        while ($row = mysqli_fetch_array($resultado_Envio)) { ?>
                            <tr>
                                <td>
                                    #
                                </td>
                                <td>
                                    <a>
                                        <?php echo $row['IDVenta']?>
                                    </a>
                                </td>

                                <td>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <p><?php echo $row['FechaEnvio']?></p>
                                        </li>
                                    </ul>
                                </td>

                                <td>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <p><?php echo $row['NombreCliE']?></p>
                                        </li>
                                    </ul>
                                </td>

                                <td>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <p><?php echo $row['DireccionCliE']?></p>
                                        </li>
                                    </ul>
                                </td>

                                <td>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <p><?php echo $row['TelefonoCliE']?></p>
                                        </li>
                                    </ul>
                                </td>

                                <td>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <!-- muestra todos los productos que envio 1 mismo usuario -->
                                            <?php 
                                                    $id = $row["IDEnvio"];

                                                    $query = "SELECT * FROM envios_producto
    
                                                    inner join envios
                                                    on envios_producto.EnviosIDEnvio = envios.IDEnvio
                                    
                                                    inner join producto
                                                    on envios_producto.ProductoIDProd = producto.IDProd
                                                    where envios_producto.EnviosIDEnvio = '$id'                                                   
                                                    ";
                                                    $listaID = mysqli_query($cnn, $query);
                                                ?>
                                            <?php while ($lista = mysqli_fetch_array($listaID)) { ?>
                                        <li>
                                            <!-- <?php echo $lista['IDEnvio']. "-";?> -->
                                            <?php echo "* ". $lista['NombreProd'];?>
                                        </li>
                                        <?php } ?>
                                        </li>

                                    </ul>
                                </td>

                                <td>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <p><?php echo "$ ".$row['TotalE']?></p>
                                        </li>
                                    </ul>
                                </td>

                                <td class="project-actions text-center">
                                    <a class="btn btn-info btn-sm"
                                        href="modificarEnvios.php?id=<?php echo $row['IDEnvio']?>">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Editar
                                    </a>

                                    <div class="container d-flex justify-content-center" style="margin-top: 10px;"> <button
                                            class="btn btn-danger " data-toggle="modal"
                                            data-target="#my-modal<?php echo ($row["IDVenta"]);?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" 
                                                width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#fff" fill="none" 
                                                stroke-linecap="round" stroke-linejoin="round" style="float: left;">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                <line x1="4" y1="7" x2="20" y2="7" />
                                                <line x1="10" y1="11" x2="10" y2="17" />
                                                <line x1="14" y1="11" x2="14" y2="17" />
                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                            </svg>
                                            Eliminar</button>
                                        <div id="my-modal<?php echo ($row["IDVenta"]);?>" class="modal fade"
                                            tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content border-0">
                                                    <div class="modal-body p-0">
                                                        <div class="card border-0 p-sm-3 p-2 justify-content-center">
                                                            <div class="card-header pb-0 bg-white border-0 ">
                                                                <div class="row">
                                                                    <div class="col ml-auto"><button type="button"
                                                                            class="close" data-dismiss="modal"
                                                                            aria-label="Close"> <span
                                                                                aria-hidden="true">&times;</span>
                                                                        </button></div>
                                                                </div>
                                                                <p class="font-weight-bold mb-2"> Esta Seguro de que Desea Eliminar el Envio * <?php echo ($row["IDVenta"]);?> * ?</p>                                                          
                                                            </div>
                                                            <div class="card-body px-sm-4 mb-2 pt-1 pb-0">
                                                                <div class="row justify-content-end no-gutters">
                                                                    <div class="col-auto"><button type="button"
                                                                            class="btn btn-light text-muted"
                                                                            data-dismiss="modal">Cancel</button></div>

                                                                    <div class="col-auto">
                                                                        <a class="btn btn-danger btn-sm"
                                                                            style="margin-top: 5px;"
                                                                            href="CRUD/eliminarEnvio.php?id=<?php echo $row['IDEnvio']?>">
                                                                            <i class="fas fa-trash">
                                                                            </i>
                                                                            Eliminar
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </td>
                            </tr>
                            <tr>
                                <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
    if (isset($_SESSION["modEnvio"])) {
        unset($_SESSION["modEnvio"]);
    }
    if (isset($_SESSION["elimEnvio"])) {
        unset($_SESSION["elimEnvio"]);
    }
?>


<?php
    require("footer.php");
?>