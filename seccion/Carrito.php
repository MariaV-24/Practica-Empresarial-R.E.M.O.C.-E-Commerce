<?php
    $total=0;
?>
    <h2 class="Titulo">Carrito de Compras</h2>
    <div class="small-container carrito-pag">
    <table>
        <thead>
            <tr>
                <!--Titulos de columnas-->
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Eliminar</th>
            </tr>
        </thead>

        <tbody>
            <?php
                if (isset($_SESSION["carrito"])) { 
                    foreach ($_SESSION["carrito"] as $indice => $arreglo) {                         
                        //precio total
                        $total += $arreglo["precio"];
                        
                        $_SESSION["total"] = $Monto = $total;
                        /*etiquetas php invertidas para usar html dentro de php */
                        
                        $idP = $arreglo["prod"];

                        $query = "SELECT CantidadTotalP FROM producto
                                where IDProd = '$idP';
                                ";

                        $sentencia = $cnn->prepare($query);
                        $sentencia->execute();
                        
// echo $query . "<br>";
                        $result = $sentencia->fetchAll();
// print_r($result);

                        ?>
            <tr>
                <td class="carrito-info">
                    <?php 
                        if ($result[0]['CantidadTotalP']<1) {?>
                            <p style="color: red; margin-right: 10px"><Strong>**El producto 
                                                        <br>
                                                    ya se a agotado. <br>
                                                    Favor de Eliminarlo 
                                                    <br>
                                                    del carrito**</Strong></p>
                        <?php }
                    ?>
                    <img src="<?php echo $arreglo["img"];?>">                  
                </td>

                <td>
                    <p><?php echo utf8_decode($arreglo["nombre"])?></p>
                </td>

                <td>
                    <?php echo "₡" . $arreglo["precio"];?>
                </td>

                <td>
                    <a href="carrito.php?item=<?php echo $arreglo["nombre"];?>" class="boton-v">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <line x1="4" y1="7" x2="20" y2="7" />
                            <line x1="10" y1="11" x2="10" y2="17" />
                            <line x1="14" y1="11" x2="14" y2="17" />
                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                        </svg>
                    </a>
                </td>
            </tr>
            <?php

                } // FIN foreach

            }

            //eliminar
            if (isset($_REQUEST["item"])) {
                $nom = $_REQUEST["item"];
                unset($_SESSION["carrito"][$nom]);
                //print_r($nom);
                echo $nom.": ELIMINADO";
                //print_r($_SESSION["carrito"]);
                //redirigir para q se muestre los cambios
                echo '
                <script type="text/javascript">
                    $(document).ready(function() {
                            window.location="../REMOC-CAMBIOS/carrito.php";

                    });     
                
                </script>
                    ';
            }

        ?>
        </tbody>
    </table>

    <!-- total a pagar -->
    <div class="total espacios">
        <table>
            <tr>
                <td>Total</td>
                <td><?php echo "₡". $total;?></td>
            </tr>

            <tr>
                <td style="text-align: center;">
                    <!-- <h4>*No Incluye el Envio.*<br> -->
                    *El costo del Envio será calculado según su compra. Nuestras Artesanas se pondrán en contacto con usted.*</h4>
                </td>
            </tr>
        </table>
    </div>






    <!-- Formulario de ventas -->
    <div class="formulario2">
        <form action="paypal.php" method="POST">
            <h3 class="Titulo" style="margin-bottom: 20px;">Formulario para Envio</h3>
            <div class="contenedor-campos2">
                <div class="campo">
                    <label class="campo__label-v" for="nombre">Nombre</label>
                    <input class="campo__field-v" type="text" placeholder="Nombre Completo" id="nombre" name="nombre"
                        required>
                </div>

                <div class="campo">
                    <label class="campo__label-v" for="telefono">Telefono</label>
                    <input class="campo__field-v" type="text" placeholder="Telefono" id="telefono" name="telefono"
                        onblur="ValidarTelefono()" required>
                </div>

                <div class="campo">
                    <label class="campo__label-v" for="direccion">Direccion</label>
                    <input class="campo__field-v" type="text" placeholder="Direccion" id="direccion" name="direccion"
                        onblur="ValidarDireccion()" required>
                </div>

                <div class="alinear-izquierda flex">
                    <input id="continuar" type="submit" name="paypal" value="Continuar" class="boton">
                </div>

            </div>
        </form>
    </div>

