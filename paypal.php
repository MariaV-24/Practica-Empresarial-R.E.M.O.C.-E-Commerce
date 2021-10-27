<?php 
    session_start();
    require('headerr.php');
    if (isset($_SESSION["carrito"]) && count($_SESSION["carrito"])>=1) { ?>

<body>
    <h3 class="Titulo">Resumen de Compra</h3>
    <p style="text-align: center; margin-top: 20px;">* Recibimos pagos por medio de <strong>SINPE Movil</strong>. 
        Para mayor informacion contactenos al <strong>+506 2445-4885</strong> *</p>
    <hr>
    <p style="text-align: center; margin-top: 30px;"><strong>Nota:</strong> Apartir de este punto el monto será pasado a <strong>Dolares(USD)</strong> para facilitar el pago con PayPal</p>
    <div class="contenedor paypal">
    <?php
        $url = "https://api.hacienda.go.cr/indicadores/tc/dolar?fbclid=IwAR3ZKPCpMKuxlTiNreXsEsm9TBzgZxINfkSCnT6zI2fCk7htA3f37kTC9Yw";
        $var = file_get_contents($url);
        $dato = json_decode($var,true);

        $convert = $dato["venta"]["valor"];
        $convert2 = $dato["compra"]["valor"];

        // var_dump($_SESSION["carrito"]);
    ?>

<!-- FORMULARIO OCULTO PARA PODER AGREGAR PRODUCTOS A VENTAS  -->
    <form action="AdminREMOC/CRUD/agregarVenta.php" method="GET" style="display: none;">
        <?php
            foreach ($_SESSION["carrito"] as $indice =>$val) { 
                ?>
                    <input type="hidden" name="idProdCarrito[]" value="<?php echo $val["prod"];?>">
                <?php
            }

            $name = $_POST["nombre"];
            $telefono = $_POST["telefono"];
            $direccion = $_POST["direccion"];
        ?>

        <input type="hidden" name="nombre" value="<?php echo $_POST["nombre"];?>">
        <input type="hidden" name="telefono" value="<?php echo $_POST["telefono"];?>">
        <input type="hidden" name="direccion" value="<?php echo $_POST["direccion"];?>">

        <!-- convertimos el monto a dolares -->
        <input type="hidden" name="monto" id="monto" value="<?php echo number_format($_SESSION["total"] / $convert,2);?>">
        
        <input type="submit" id="add" value="Agregar">
    </form>



        <div class="contenedor3">
            <div class="alert alert-danger alert-dismissible fade show" id="msj2" style="display:none" role="alert">
                <strong id="msj"></strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>
                            <h5>Productos</h5>
                        </th>
                        <th>
                            <h5>Total</h5>
                        </th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>
                            <h6>
                                <?php 
                                    if (isset($_SESSION["carrito"])) {
                                        foreach ($_SESSION["carrito"] as $key => $value) {
                                            ?>
                                                <ul>
                                                    <?php echo utf8_decode($value["nombre"]);?>
                                                </ul>
                                            <?php
                                        }
                                    }
                                ?>
                            </h6>
                        </td>
                        <td>
                            <h6><?php 
                                    if (isset($_SESSION["total"])) {
                                        echo "$".number_format($_SESSION["total"] / $convert,2);
                                    }
                            ?></h6>
                        </td>
                    </tr>
                </tbody>

            </table>

            <!-- Linea final o separadora de elementos -->
            <hr>

        </div>
        


        
        <h4>Click en el siguiente Boton para Realizar el Pago</h4>
            <input type="hidden" name="monto" id="monto" value="<?php echo number_format($_SESSION["total"] / $convert,2);?>">
        <div class="contenedor2 margen_top">

            <!-- Set up a container element for the button -->
            <div id="paypal-button-container"></div>
                <!-- Include the PayPal JavaScript SDK -->

                <!-- este seria el oficial que va a estar -->
                <!-- <script src="https://www.paypal.com/sdk/js?client-id=AXjmM4A3pEKDYfbzLINFyZY1g5ZaCXyJgt4JK8ow6CuSTNqfC7PixNqMCB0rgwD-oEkKMgy-KDVuF11n&disable-funding=credit,card&locale=es_CR&currency=USD"></script> -->
                
                <!-- Pruebas ↓ -->
                <script src="https://www.paypal.com/sdk/js?client-id=AY89AdvjgQePeyfssJkIgkWt81VxD7vpwhRPuPorWuX0RIt_zT1myn-C4LnnCyDWwJKOBLQLf54NsvpW&disable-funding=credit,card&locale=es_CR&currency=USD"></script>


                
                <!-- Add the checkout buttons, set up the order and approve the order -->
                <script>
                    var dato = $('#monto').val();
                        paypal.Buttons({
                        createOrder: function(data, actions) {
                        return actions.order.create({
                            purchase_units: [{

                                "amount": {
                                    "currency_code": "USD",
                                    "value": $('#monto').val()
                                }

                            }]
                        });
                        },
                        onApprove: function(data, actions) {
                            //aqui es dnd va la parte para agregar a la tabla de ventas 

                            //este "add" sale dl agregar del formulario oculto de arriba
                            return actions.order.capture().then(function(details) {
                                $('#add').click();                             
                            });
                        },
                        onCancel: function (data) {
                            $('#msj2').css("display", "block");
                            $('#msj').text("No se Pudo Completar el Pago a PayPal");
                        },
                        onError: function (err) {
                            $('#msj2').css("display", "block");
                            $('#msj').text("No se a podido conectar correctamente con PalPal");
                            }
                    }).render('#paypal-button-container'); // Display payment options on your web page
                    
                </script>
            </div>
    </div>
</body>
<?php
}else {
    echo '<h2 style="margin-top:5rem;" ><strong>Debes Agregar un Producto para poder continuar.</strong></h2>';
}
?>

<?php
    require('footer.php');
?>