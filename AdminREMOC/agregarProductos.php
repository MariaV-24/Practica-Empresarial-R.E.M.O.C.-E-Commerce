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
                    <h1 class="m-0 text-dark">Agregar Productos</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- SECCION PRINCIPAL -->
    <section class="content">
        <form action="CRUD/agregarProducto.php" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Productos</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                    data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>

                        <!-- ************************************************************************************************** -->
                        <div class="card-body">
                            
                            <div class="alert alert-success alert-dismissible fade show" style="<?php 
                                if (!isset($_SESSION["msj"])) {
                                    echo "display:none";
                                }
                            ?>" role="alert">
                            <strong>Producto Agregado Correctamente</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>


                            <div class="form-group">
                                <label for="inputName">Artesana</label>
                                <select id="" class="form-control custom-select" name="idArtesana" onchange="codArtes(this)">
                                    <?php                      
                                        $consulta = "SELECT * FROM artesana";
                                        $listaID = mysqli_query($cnn, $consulta) or die(mysqli_errno($cnn));                               
                                    ?>
                                    <option value="-1">Seleccionar</option>
                                    <?php foreach ($listaID as $opciones): {}?>
                                        <option value="<?php echo $opciones['IDArtesana']?>">
                                            <?php echo $opciones['NombreArtesana']?>
                                        </option>                           
                                    <?php endforeach ?>                                                
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="inputName">Codigo de la Artesana</label>
                                <select id="codArtesana" class="form-control custom-select" name="codArtesana">
                                    <!-- codigo ajax abajo... -->

                                    
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="inputName">Nombre del Producto</label>
                                <input type="text" name="nombreP" id="inputName" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="inputName">Tamaño Aproximado</label>
                                <input type="text" name="size" id="inputName" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="inputName">Cantidad de Productos Existentes</label>
                                <input type="text" name="cantidadP" id="inputName" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="inputStatus">Categoria</label>
                                <select id="categ" class="form-control custom-select" name="categoria">
                                    <option value="Destacados">Destacados</option>
                                    <option value="Nuevo">Nuevo</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="inputClientCompany">Precio</label>
                                <input type="text" name="precio" id="inputClientCompany" class="form-control" required>
                            </div>
                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!-- /.card -->
                </div>

                <!-- BUSCAR IMAGEN DEl PRODUCTO -->
                <div class="col-md-6">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Imagen del Producto</h3>                          

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                    data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <p><strong>* Tamaño Máximo</strong> Recomendado para la Imagen: <strong>3 MB* </strong></p>
                            <div class="form-group">
                                <input type="file" value="Buscar Archivo" 
                                        id="imagenProd" name="imagenProd" accept="image/*"
                                        required>
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
                    <a href="inicio.php" class="btn btn-secondary" 
                        style="margin-left: 20px;">Cancelar</a>

                    <input type="submit" value="Agregar" 
                        class="btn btn-success float-left"                      
                        name="agregarProducto"
                        onclick="categ()">
                </div>
            </div>
        </form>
    </section>

    <br>
</div>
<!-- /.content-wrapper -->

<!-- boora la sesion del msj -->
<?php
    if (isset($_SESSION["msj"])) {
        unset($_SESSION["msj"]);
    }
?>


<!-- categoria -->
    <script>
function categ() {
    var x = document.getElementById("categ").value;
    document.getElementById("categoria").innerHTML = x;
}
/************************************************************************************************/
function codArtes(item) {
        var idSelect = jQuery(item).children(":selected").attr("value");

        console.log(idSelect);

        if (idSelect > 0) {
            $.ajax({
                type: 'POST',
                url: 'crud/dbcon.php',
                data: {
                    opcion: 'consultaArtesana',
                    id: idSelect
                },
                cache: false,
                success: function(response, textStatus, XMLHttpRequest) {
                    var result = JSON.parse(response);
                    $('#codArtesana').empty();
                    console.log(result);

                    $("#codArtesana").append('<option value="'+ result.res[0].CodigoArtesana +'">'+ result.res[0].CodigoArtesana +'</option>');
                    $("#codArtesana > option[value="+ result.res[0].CodigoArtesana +"]").attr("selected",true);
                        
                },
                error: function(xhr, type, exception) {
                    $('#codArtesana').empty();
                }
            });
        } else {
            $('#codArtesana').empty();
        }
    };
</script>

<?php
    require("footer.php");
?>-