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
                    <h1 class="m-0 text-dark">Agregar Envio</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- SECCION PRINCIPAL -->
    <section class="content">
        <form name="autollenar" id="autollenar" action="CRUD/agregarEnvio.php" method="POST">
            <?php          
                $op = 1;
                    $query = "SELECT * FROM ventas";
                    $listaID = array();
                    $datos =	mysqli_query($cnn, $query) or die(mysqli_errno($cnn));

                while($row = mysqli_fetch_array($datos)){
                    $listaID[] = $row;
                }
            ?>
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
                            <!-- msj alerta -->
                            <div class="alert alert-success alert-dismissible fade show" style="<?php 
                                if (!isset($_SESSION["envio"])) {
                                    echo "display:none";
                                }
                            ?>" role="alert">
                            <strong>Envio Agregado Correctamente</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            
                            <div class="form-group">
                                <label for="inputName">Fecha</label>
                                <input type="date" name="fecha" id="inputName" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="inputName">Codigo de Venta</label>
                                <select name="cod" id="cod" onchange="consulta(this);" required>

                                    <?php
                                    if (isset($_GET["opcion"])) {
                                        $op = $_GET["opcion"];                                       
                                        ?>
                                        <option value="<?php echo $listaID['IDVenta'];?>">
                                            <?php echo $listaID['IDVenta'];?>
                                        </option>
                                        <?php
                                        }
                                    ?>

                                    <option value="-1">Seleccionar</option>
                                    <?php foreach($listaID as $key=>$val){?>
                                        <option value="<?php echo $val['IDVenta']?>">
                                            <?php echo $val['IDVenta'];?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="inputName">Nombre del Cliente</label>
                                <input type="text" name="nombreC" id="nombreC" class="form-control" value="" readonly>
                            </div>

                            <div class="form-group">
                                <label for="inputName">Direccion del Cliente</label>
                                <input type="text" name="direccionC" id="direccionC" class="form-control" readonly>
                            </div>

                            <div class="form-group">
                                <label for="inputName">Telefono del Cliente</label>
                                <input type="text" name="telefonoC" id="telefonoC" class="form-control" readonly>
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

                                </ul>
                            </div>

                        <div class="form-group" style="margin-top: 10px; margin-left: 20px; margin-right: 380px;">
                            <label for="inputName">Total Pagado</label>
                            <input type="text" name="total" id="total" class="form-control" readonly>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>




            <div class="row">
                <div class="col-12">
                <a href="inicio.php" class="btn btn-secondary" style="margin-left: 20px;">Cancelar</a>

                    <input type="submit" value="Agregar" class="btn btn-success float-left" name="agregarEnvio">
                </div>
            </div>
        </form>
    </section>
</div>
<!-- /.content-wrapper -->

<?php
    if (isset($_SESSION["envio"])) {
        unset($_SESSION["envio"]);
    }
?>

<?php
    require("footer.php");
?>