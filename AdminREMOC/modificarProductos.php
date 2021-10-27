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
                    <h1 class="m-0 text-dark">Modificar Productos</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- SECCION PRINCIPAL -->
    <section class="content">
        <form action="modificarProductos.php?id=<?php echo $_GET['id'];?>" method="POST" enctype="multipart/form-data">
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
                            <?php  
                                require('CRUD/modificarProducto.php');
                            ?>

                            <div class="form-group">
                                <label for="inputName">Codigo del Producto</label>
                                <input type="text" name="id" id="inputName" value="<?php echo $id; ?>"
                                    class="form-control" disabled required>
                            </div>

                            <div class="form-group">
                                <label for="inputName">Codigo de la Artesana</label>
                                <input type="text" name="codArtesana" id="inputName" 
                                        value="<?php echo $codArtesana; ?>" class="form-control" readonly>
                            </div>

                            <div class="form-group">
                                <label for="inputName">Nombre del Producto</label>
                                <input type="text" name="nombreP" id="inputName" value="<?php echo $nombreP; ?>" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="inputName">Tamaño Aproximado</label>
                                <input type="text" name="size" id="inputName" value="<?php echo $size; ?>" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="inputName">Cantidad de Productos Existentes</label>
                                <input type="text" name="cantidadP" id="inputName" class="form-control" value="<?php echo $cantidadP; ?>">
                            </div>

                            <div class="form-group">
                                <label for="inputStatus">Categorias</label>
                                <select id="categ" class="form-control custom-select" name="categoria"
                                    value="<?php echo $categoria; ?>"
                                    <?php
                                        if ($opciones['CodigoArtesana'] == $categoria) {
                                            echo 'selected';
                                        }
                                    ?>
                                >
                                    <option value="Destacados" 
                                        <?php if($categoria == "Destacados"){ echo " selected='selected'"; } ?>
                                        >Destacados
                                    </option>
                                    
                                    <option value="Nuevo"
                                        <?php if($categoria == "Nuevo"){ echo " selected='selected'"; } ?>
                                        >Nuevo
                                    </option>
                                    
                                    <option value="Sin Categoria"
                                        <?php if($categoria == "Sin Categoria"){ echo " selected='selected'"; } ?>
                                        >Sin Categoria
                                    </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="inputClientCompany">Precio</label>
                                <input type="text" name="precio" value="<?php echo $precio; ?>" id="inputClientCompany"
                                    class="form-control" required>
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
                            <div class="form-group">
                                <input type="hidden" value="<?php echo $imagenProd; ?>" id="imagenProd" 
                                        name="imagenProd2"
                                    class="form-control" readonly> 

                                <img class="zoom img" loading="lazy" style="width: 250px; margin-bottom: 5px;"
                                src="../<?php echo $imagenProd?>" 
                                alt="<?php echo utf8_encode($row['NombreProd']) ?>">
                                
                                <br>

                                <input type="file" value="Buscar Archivo" value=""
                                    id="imagenProd" name="imagenProd">
                                <!-- <input type="file" value="Buscar Archivo" value="<?php echo $imagenProd; ?>"
                                    id="imagenProd" name="imagenProd"> -->
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

                    <!-- <input type="submit" id="show" value="Modificar Producto" class="btn btn-info float-left" -->
                    <input type="submit" value="Modificar Producto" class="btn btn-info float-left"
                        name="agregar" onclick="categ(), codigArtes()">
                </div>
            </div>
        </form>
    </section>

    <br>
</div>
<!-- /.content-wrapper -->

<script>
    function categ() {
        var x = document.getElementById("categ").value;
        document.getElementById("categoria").innerHTML = x;
    }

    function codigArtes() {
        var y = document.getElementById("codigoArtesana").value;
        document.getElementById("codArtesana").innerHTML = y;
    } 
</script>

<script src="https://code.jquery.com/jquery-3.2.1.js"></script>

<?php
  require("footer.php");
?>-