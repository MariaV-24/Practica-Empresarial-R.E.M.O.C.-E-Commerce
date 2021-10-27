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
                <h1 class="m-0 text-dark">Agregar Artesanas</h1>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- SECCION PRINCIPAL -->
        <section class="content">
            <form action="CRUD/agregarArtesana.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                        <h3 class="card-title">Datos para Artesanas</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                        </div>
                        </div>

                        <!-- ************************************************************************************************** -->
                        <div class="card-body">
                            <!-- msj alerta -->
                                <?php 
                                    $display = "none";
                                    
                                    if(isset($_SESSION['artesana'])){
                                        $mensaje = "Artesana Agregada Correctamente";
                                        $display = "block;";
                                    }
                                    if(isset($_SESSION['error'])){
                                        $mensaje = "El Codigo de Artesana ya Existe";
                                        $display = "block;";
                                    }
                                ?>
                            
                            <div class="alert alert-success alert-dismissible fade show" 
                                style="display:<?php echo($display);?>"
                                role="alert">
                            <strong><?php echo($mensaje);?></strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                <!-- ********************************************************************************************************* -->
                            <div class="form-group">
                                <label for="inputName">Codigo de la Artesana</label>
                                <input type="text" name="codArtesana" id="inputName" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="inputName">Nombre de la Artesana</label>
                                <input type="text" name="nomArtesana" id="inputName" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="inputClientCompany">Apellidos de las Artesanas</label>
                                <input type="text" name="apellidoArtesana" id="inputClientCompany" class="form-control" required>
                            </div>                   
                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!-- /.card -->
                    </div>

                    <!-- BUSCAR IMAGEN DE PERFIL -->
                    <div class="col-md-6">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Imagen de Perfil para las Artesanas</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" 
                                    data-card-widget="collapse" 
                                    data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                                </div>
                            </div>

                            <div class="card-body">
                                <p><strong>* Tamaño Máximo</strong> Recomendado para la Imagen: <strong>3 MB *</strong></p>
                                
                                <div class="form-group">
                                    <input type="file" value="Buscar Archivo" accept="image/*"
                                    id="imgArtes" name="imgArtes">
                                    <br>
                                </div>                           
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

                    
                </div>
                <div class="row">
                    <div class="col-12">
                    <a href="inicio.php" 
                    class="btn btn-secondary" style="margin-left: 20px;">Cancelar</a>

                    <input type="submit" value="Agregar" 
                    class="btn btn-success float-left"
                    name="agregarArtesana"
                    >
                    </div>
                </div>
            </form>    
        </section>
        


    </div>
    <!-- /.content-wrapper -->

<?php
    if (isset($_SESSION["artesana"])) {
        unset($_SESSION["artesana"]);
    }

    if (isset($_SESSION["error"])) {
        unset($_SESSION["error"]);
    }
?>

<?php
  require("footer.php");
?>