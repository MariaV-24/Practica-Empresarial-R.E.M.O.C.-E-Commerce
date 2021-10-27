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
                    <h1 class="m-0 text-dark">Listar Eventos</h1>
                </div><!-- /.col -->


                <!-- SEARCH FORM -->
                <form action="consultarEventos.php" method="get" class="form-inline ml-3">
                    <div class="input-group input-group-sm">
                        <input class="" type="search" name="buscar" placeholder="Titulo del Evento" aria-label="Search">
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
                    if (!isset($_SESSION["modEvento"])) {
                        echo "display:none";
                    }

                    ?>" role="alert">
                <strong>Evento Modificado Correctamente</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> 

            <!-- msj al eliminar -->
            <div class="alert alert-success alert-dismissible fade show" style="<?php 
                    if (!isset($_SESSION["eliminarEvento"])) {
                        echo "display:none";
                    }

                    ?>" role="alert">
                <strong>Evento Eliminado Correctamente</strong>
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
                                <th style="width: 15%">
                                    Codigo Evento
                                </th>
                                <th style="width: 15%">
                                    Titulo del Evento
                                </th>
                                <th style="width: 25%">
                                    Descripcion del Evento
                                </th>
                                <th style="width: 15%">
                                    Ubicacion del Evento
                                </th>
                                <th style="width: 10%">
                                    Fecha del Evento
                                </th>
                                <th style="width: 100%" class="text-center">
                                    Accion
                                </th>
                            </tr>
                        </thead>

                        <tbody>                   
                            <?php                            
                                require('CRUD/listarEventos.php');
                            
                                /* vamos a recorrer los resultados de fila en fila  */
                                while ($row = mysqli_fetch_array($resultado_Eventos)) { ?>
                            <tr>
                                <td>
                                    #
                                </td>

                                <td>
                                    <?php echo $row['IDEvento']?>
                                </td>

                                <td>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <p><?php echo $row['TituloEvento']?></p>
                                        </li>
                                    </ul>
                                </td>

                                <td>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <p><?php echo $row['DescripcionEvento']?></p>
                                        </li>
                                    </ul>
                                </td>

                                <td>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <p><?php echo $row['Ubicacion']?></p>
                                        </li>
                                    </ul>
                                </td>

                                <td>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <p><?php echo $row['FechaEvento']?></p>
                                        </li>
                                    </ul>
                                </td>

                                <td class="project-actions text-center">
                                    <a class="btn btn-info btn-sm"
                                        href="modificarEventos.php?id=<?php echo $row['IDEvento']?>">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Editar
                                    </a>

                                    <!-- <a class="btn btn-danger btn-sm"
                                        href="CRUD/EliminarEventos.php?id=<?php echo $row['IDEvento']?>">
                                        <i class="fas fa-trash">
                                        </i>
                                        Eliminar
                                    </a> -->

                                    <div class="container d-flex justify-content-center" style="margin-top: 10px;"> <button
                                            class="btn btn-danger " data-toggle="modal"
                                            data-target="#my-modal<?php echo ($row["IDEvento"]);?>">
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
                                        <div id="my-modal<?php echo ($row["IDEvento"]);?>" class="modal fade"
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
                                                                <p class="font-weight-bold mb-2"> Esta Seguro de que Desea Eliminar el Evento * <?php echo ($row["TituloEvento"]);?> * ?</p>                                                          
                                                            </div>
                                                            <div class="card-body px-sm-4 mb-2 pt-1 pb-0">
                                                                <div class="row justify-content-end no-gutters">
                                                                    <div class="col-auto"><button type="button"
                                                                            class="btn btn-light text-muted"
                                                                            data-dismiss="modal">Cancel</button></div>

                                                                    <div class="col-auto">
                                                                    <a class="btn btn-danger btn-sm"
                                                                        href="CRUD/EliminarEventos.php?id=<?php echo $row['IDEvento']?>">
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
    if (isset($_SESSION["modEvento"])) {
        unset($_SESSION["modEvento"]);
    }
    if (isset($_SESSION["eliminarEvento"])) {
        unset($_SESSION["eliminarEvento"]);
    }
?>

<?php
    require("footer.php");
?>