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
                    <h1 class="m-0 text-dark">Modificar Envio</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- SECCION PRINCIPAL -->
    <section class="content">
        <form name="autollenar" id="autollenar" action="modificarEnvios.php?id=<?php echo $_GET['id'];?>" method="POST">
        <!-- <?php
                $op = 1;
                    $query = "SELECT * FROM envios";
                    $listaID = array();
                    $datos = mysqli_query($cnn, $query) or die(mysqli_errno($cnn));

                while($row = mysqli_fetch_array($datos)){
                    $listaID[] = $row;
                }
            ?> -->
        <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Envios</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                    data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>

                        <!-- ************************************************************************************************** -->
                        <div class="card-body">
                            <?php
                                require('CRUD/modificarEnvio.php');
                            ?>
                            <div class="form-group">
                                <label for="inputName">Codigo Envio</label>
                                <input type="text" name="codEnvio" id="inputName" class="form-control"
                                        value="<?php echo $prods[0]['IDEnvio']?>" readonly>

                                <input type="hidden" name="idVenta" id="inputName" class="form-control"
                                value="<?php echo $prods[0]['IDVenta']?>" readonly>
                            </div>

                            <div class="form-group">
                                <label for="inputName">Fecha</label>
                                <input type="date" name="fecha" id="inputName" class="form-control"
                                        value="<?php echo $prods[0]['FechaEnvio']?>" >
                            </div>                         

                            <div class="form-group">
                                <label for="inputName">Nombre del Cliente</label>
                                <input type="text" name="nombreC" id="nombreC" class="form-control"
                                        value="<?php echo $prods[0]['NombreCliE']?>">
                            </div>

                            <div class="form-group">
                                <label for="inputName">Direccion del Cliente</label>
                                <input type="text" name="direccionC" id="direccionC" class="form-control"
                                    value="<?php echo $prods[0]['DireccionCliE']?>">
                            </div>

                            <div class="form-group">
                                <label for="inputName">Telefono del Cliente</label>
                                <input type="text" name="telefonoC" id="telefonoC" class="form-control"
                                    value="<?php echo $prods[0]['TelefonoCliE']?>">
                            </div>

                        </div>

                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>

                <!-- INFORMACION SOBRE EL PRODUCTO -->
                <div class="col-md-6">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Informacion sobre el Producto a Enviar</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                    data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                                </div>
                            </div>

                            <div style="margin-top: 10px; margin-left: 20px;">
                                <label for="inputName">Lista de Productos</label>
                                <!-- $datos -->
                                <ul id="lista">
                                    <?php
                                        for ($i=0; $i < count($prods); $i++) { 
                                            ?>
                                                <li>
                                                    <?php
                                                        echo $prods[$i]['NombreProd'];
                                                    ?>
                                                </li>
                                            <?php
                                        }
                                    ?>
                                </ul>
                        </div>

                        <div class="form-group" style="margin-top: 10px; margin-left: 20px; margin-right: 380px;">
                            <label for="inputName">Total</label>
                            <input type="text" name="total" id="total"
                            class="form-control"
                            value="<?php echo $prods[0]['TotalE']?>" readonly>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>




            <div class="row">
                <div class="col-12">
                    <a href="inicio.php" class="btn btn-secondary" style="margin-left: 20px;">Cancelar</a>

                    <input type="submit" value="Modificar" class="btn btn-success float-left" name="ModificarEnvio">
                </div>
            </div>
        </form>
    </section>
</div>
<!-- /.content-wrapper -->

<?php
    require("footer.php");
?>