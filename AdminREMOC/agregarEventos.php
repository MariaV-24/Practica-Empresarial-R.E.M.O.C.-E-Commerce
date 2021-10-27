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
                    <h1 class="m-0 text-dark">Agregar Eventos</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- SECCION PRINCIPAL -->
    <section class="content">
        <form action="CRUD/agregarEvento.php" method="POST">
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
                            <!-- msj alerta -->
                            <div class="alert alert-success alert-dismissible fade show" style="<?php 
                                if (!isset($_SESSION["evento"])) {
                                    echo "display:none";
                                }
                            ?>" role="alert">
                            <strong>Evento Agregado Correctamente</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="form-group">
                                <label for="inputName">Titulo del Evento</label>
                                <input type="text" name="titulo" id="inputName" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="inputName">Descipcion del Evento</label>
                                <input type="text" name="descripcion" id="inputName" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="inputName">Ubicacion</label>
                                <input type="text" name="ubicacion" id="inputName" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="inputClientCompany">Fecha del Evento</label>
                                <input type="date" name="fecha" id="inputClientCompany" class="form-control" required>
                            </div>

                        </div>
                        <!-- /.card-body -->

                    </div>

                    <!-- /.card -->

                </div>

            </div>

            <div class="row">
                <div class="col-12">
                    <a href="inicio.php" class="btn btn-secondary" 
                    style="margin-left: 20px;">Cancelar</a>

                    <input type="submit" value="Agregar" 
                        class="btn btn-success float-left" 
                        name="agregarEvento"                       
                    >
                </div>

            </div>
        </form>
    </section>

</div>
<!-- /.content-wrapper -->

<!-- boora la sesion del msj -->
<?php
    if (isset($_SESSION["evento"])) {
        unset($_SESSION["evento"]);
    }
?>

<?php
  require("footer.php");
?>