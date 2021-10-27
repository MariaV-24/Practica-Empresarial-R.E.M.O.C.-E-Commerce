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
                <h1 class="m-0 text-dark">Modificar Artesanas</h1>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- SECCION PRINCIPAL -->
        <section class="content">
            <form action="CRUD/modificarArtesana.php?id=<?php echo $_GET['id'];?>" method="POST" enctype="multipart/form-data">
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
                            <?php  
                                require('CRUD/modificarArtesana.php');
                            ?>
                            <div class="form-group">
                            <label for="inputName">ID de la Artesana</label>
                                <input type="text" name="id" id="inputName" 
                                    class="form-control" value="<?php echo $id; ?>" readonly>
                            </div>

                            <div class="form-group">
                            <label for="inputName">Codigo de la Artesana</label>
                                <input type="text" name="codArtesana" id="inputName" 
                                    class="form-control" value="<?php echo $codArtesana; ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="inputName">Nombre de la Artesana</label>
                                <input type="text" name="nomArtesana" id="inputName" 
                                    class="form-control" value="<?php echo $nombreArtesana; ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="inputClientCompany">Apellidos de las Artesanas</label>
                                <input type="text" name="apellidoArtesana" id="inputClientCompany" 
                                    class="form-control" value="<?php echo $apellidoArtesana; ?>" required>
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

                            <!-- $imagenArtesana -->
                            <div class="card-body">
                                <div class="form-group">
                                    <!-- ruta completa de la img -->
                                <input type="hidden" value="<?php echo $imagenArtesana; ?>" id="imgArtes" 
                                        name="imgArtes2" class="form-control" readonly>

                                <!-- imagen -->
                                    <img class="zoom img" loading="lazy" style="width: 250px; margin-bottom: 5px;"
                                    src="../<?php echo $imagenArtesana?>" 
                                    alt="<?php echo utf8_encode($row['NombreArtesana']) ?>">
                                <br>
                                <!-- file -->
                                    <input type="file" value=""
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
                    <a href="inicio.php" class="btn btn-secondary" style="margin-left: 20px;">Cancelar</a>
                    
                    <input type="submit" value="Modificar" 
                    class="btn btn-success float-left"
                    name="modificarArtesana"
                    >
                    </div>
                </div>
            </form>    
        </section>
        


    </div>
    <!-- /.content-wrapper -->



<?php
  require("footer.php");
?>