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
                    <h1 class="m-0 text-dark">Agregar Venta</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- SECCION PRINCIPAL -->
    <section class="content">
        <form id="autollenar" action="CRUD/agregarVentaSimpe.php" method="POST">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Ventas</h3>
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
                                if (!isset($_SESSION["ventaSimpe"])) {
                                    echo "display:none";
                                }
                            ?>" role="alert">
                            <strong>Venta Agregada Correctamente</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>



                            <div class="form-group">
                                <label for="inputName">Nombre del Producto</label>
                                <select id="addProd" class="form-control custom-select" name="nombrev" style="margin-bottom: 8px;" required>
                                    <?php                      
                                        $consulta = "SELECT * FROM producto";
                                        $listaID = mysqli_query($cnn, $consulta) or die(mysqli_errno($cnn));                               
                                    ?>

                                    <option value="-1">Seleccionar</option>
                                    <?php foreach ($listaID as $opciones): {}?>
                                        <option value="<?php echo ($opciones['IDProd'].','. $opciones['Precio'])?>">
                                            <?php echo $opciones['IDProd']?> <?php echo $opciones['NombreProd']?>
                                        </option>                           
                                    <?php endforeach ?>                                                
                                </select>

                                <a href="#" class="btn btn-secondary float-left" id="addVenta" onclick="agregarProd()">Agregar</a>
                                <br><br><br>

                                <div>
                                    <label for="inputName">Lista de Productos</label>                                   
                                    <!-- $datos -->                      
                                    <ul id="lista">
                                        
                                    </ul>
                                    <ul id="listaID">
                                        <!-- aqui van los ID'S de cd producto que se agrega -->
                                    </ul>
                                </div>

                            </div>
                        

                            <div class="form-group">
                                <label for="inputClientCompany">Fecha de la Venta</label>
                                <input type="date" name="fechav" id="inputClientCompany" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="inputName">Total</label>
                                <input type="text" name="totalv" id="totalv" class="form-control" readonly>
                            </div>
                            



                        </div>
                        <!-- /.card-body -->

                    </div>

                    <!-- /.card -->

                </div>

                <div class="col-md-6">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Datos del Cliente</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                    data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Nombre del Cliente</label>
                                <input type="text" name="nombreClientev" id="inputName" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="inputName">Direccion del Cliente</label>
                                <input type="text" name="direccionClientev" id="inputName" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="inputName">Telefono del Cliente</label>
                                <input type="text" name="telefonoClientev" id="inputName" class="form-control" required>
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
                        name="agregarVentaSimpe"                       
                    >
                </div>

            </div>
        </form>
    </section>

</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
    function agregarProd() {
        var idSelect = jQuery(addProd).children(":selected").attr("value");
        var precio = idSelect.split(",");
        
        idSelect = precio[0];
        
        var nombreP = jQuery(addProd).children(":selected").text();
        precio = precio[1];

        var total = parseInt($("#totalv").val())>0 ? parseInt($("#totalv").val()) : 0;
        var totalP = $("#totalv").val(parseInt(total)+parseInt(precio));
        
        //muestra los nombres en la lista
        $("#lista").append('<li id="'+ idSelect +'">' + nombreP + ' <a style="color: red" class="fas fa-trash" onclick="eliminar(this, '+idSelect+')"></a></li>');

        //inputs ocultos para guardar en BD (PRECIO)
        $("#autollenar").append('<input id="'+ idSelect +'" name="lista[]" type="hidden" value="' + precio + '"></input>');

        /* IDS ocultos de la lista de Inputs */
        $("#autollenar").append('<input id="'+ idSelect +'" name="listaID[]" type="hidden" value="' + idSelect + '"></input>');
    }

    function eliminar(delet, id) {
        //elimina cd prod individualmente de la lista
        $(delet).parent().remove();

        var resta = parseInt($("#autollenar").find("input#"+id).first().val());   
        
        var total = parseInt($("#totalv").val())>0 ? parseInt($("#totalv").val()) : 0;
        $("#totalv").val(parseInt(total)-parseInt(resta));

        //eliminar inputs ocultos repetidos
        $("#autollenar").find("input#"+id).first().remove();

    }
</script>




<!-- boora la sesion del msj -->
<?php
    if (isset($_SESSION["ventaSimpe"])) {
        unset($_SESSION["ventaSimpe"]);
    }
?>

<?php
  require("footer.php");
?>