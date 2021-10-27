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
                <h1 class="m-0 text-dark">Modificar Eventos</h1>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        
        <!-- SECCION PRINCIPAL -->
        <section class="content">
            <form action="ModificarEventos.php?id=<?php echo $_GET['id'];?>" method="POST">
                <div class="row">
                    <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                        <h3 class="card-title">Eventos</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" 
                                    data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                        </div>
                        </div>

                        <!-- ************************************************************************************************** -->
                        <div class="card-body">
                            <?php  
                                require('CRUD/modificarEvento.php');
                            ?>
                        <div class="form-group">
                                <label for="inputName" >Codigo del Evento</label>
                                <input type="text" name="id" id="inputName" 
                                    class="form-control" value="<?php echo $id; ?>" disabled  required>
                            </div>

                            <div class="form-group">
                                <label for="inputName">Titulo del Evento</label>
                                <input type="text" rows="2" name="titulo" id="inputName" 
                                    class="form-control" value="<?php echo $titulo; ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="inputName">Descipcion del Evento</label>
                                <input type="text" rows="3" name="descripcion" id="inputName" 
                                    class="form-control" value="<?php echo $descripcion; ?>" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="inputName">Ubicacion del Evento</label>
                                <input type="text" rows="4" name="ubicacion" id="inputName" 
                                    class="form-control" value="<?php echo $ubicacion; ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="inputClientCompany">Fecha del Evento</label>
                                <input type="date" rows="5" name="fecha" id="inputClientCompany" 
                                    class="form-control" value="<?php echo $fecha; ?>" required>
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

                        <input type="submit" name="agregar" 
                        value="Modificar" 
                        class="btn btn-success float-left">
                    </div>
                </div>
            </form>    
        </section>

    </div>
    <!-- /.content-wrapper -->



<?php
  require("footer.php");
?>