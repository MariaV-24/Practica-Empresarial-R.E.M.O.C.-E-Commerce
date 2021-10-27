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
                <h1 class="m-0 text-dark">Consultar Ventas</h1>
            </div><!-- /.col -->
            
            <!-- SEARCH FORM -->
            <form action="ConsultarVenta.php" method="get" class="form-inline ml-3">
                    <div class="input-group input-group-sm">
                        <input class="" type="search" name="buscar" placeholder="Nombre del Cliente" aria-label="Search">
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
            <h3 class="card-title">Listar Ventas</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
            </div>
        </div>
        
        <div class="card-body p-0">
            <form action="" method="">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 1%">
                                #
                            </th>
                            <th style="width: 10%">
                                Codigo de  Venta
                            </th>
                            <th style="width: 13%">
                                Nombre del Producto
                            </th>
                            <th style="width: 12%">
                                Nombre del Cliente
                            </th>
                            <th style="width: 12%">
                                Direccion del Cliente
                            </th>
                            <th style="width: 12%">
                                Telefono del Cliente
                            </th>
                            <th style="width: 15%">
                                Tipo de Venta
                            </th>
                            <th style="width: 12%">
                                Fecha de la Venta
                            </th>
                            <th style="width: 12%">
                                Total
                            </th>
                            
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php 
                            require("CRUD/consultarVenta.php");

                            while ($row = $result->fetch_array()) { ?>
                                <tr>
                                    <!-- # -->
                                    <td>
                                        #
                                    </td>
                                        <!-- Codigo -->
                                    <td>
                                        <a>
                                        <?php echo $row['IDVenta']?>
                                        </a>
                                    </td>
                                        <!-- Nombre del Producto -->
                                    <td>
                                    <ul class="list-inline">
                                            <li class="list-inline-item">
                                            <?php 
                                                    $id = $row["IDVenta"];

                                                    $query = "SELECT * FROM producto_ventas
                                                    inner join ventas
                                                    on producto_ventas.VentasIDVentas = ventas.IDVenta

                                                    inner join producto
                                                    on producto_ventas.ProductoIDProd = producto.IDProd
                                                    where producto_ventas.VentasIDVentas = '$id'
                                                    ";
                                                    $listaID = mysqli_query($cnn, $query) or die(mysqli_errno($cnn));
                                                ?>
                                                <?php while ($lista = mysqli_fetch_array($listaID)) { ?>
                                                        <li>
                                                            <?php echo "* ".$lista['NombreProd'];?>
                                                        </li>  
                                                <?php } ?>
                                            </li>
                                        </ul>
          
                                    </td>
                                            <!-- nombre cliente  -->
                                        <td>
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <p><?php echo $row['NombreCliente']?></p>
                                                </li>
                                            </ul>
                                        </td>
                                            <!-- direccion cliente  -->
                                        <td>
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <p><?php echo $row['DireccionCliente']?></p>
                                                </li>
                                            </ul>
                                        </td>
                                            <!-- telefono cliente  -->
                                        <td>
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <p><?php echo $row['TelefonoCliente']?></p>
                                                </li>
                                            </ul>
                                        </td>

                                        <td>
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <p><?php 
                                                                                // IF Ternario
                                                        echo $row['TipoVenta'] == 0 ? "PayPal" : "Sinpe Movil";

                                                    ?></p>
                                                </li>
                                            </ul>
                                        </td>

                                            <!-- fehca de venta  -->
                                        <td>
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <p><?php echo $row['Fecha']?></p>
                                                </li>
                                            </ul>
                                        </td>
                                            <!-- Total Final + envio -->
                                        <td>
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <p><?php echo "$". $row['Total']?></p>
                                                </li>
                                            </ul>
                                        </td>

                                    </tr>
                                <tr> 
                            <?php } ?>                             
                    </tbody>
                </table>
            </form>

        </div>
        <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
    


    </div>
    <!-- /.content-wrapper -->



<?php
    require("footer.php");
?>