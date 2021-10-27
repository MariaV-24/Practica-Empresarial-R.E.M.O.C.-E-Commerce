<div class="small-container ultProd">
    <h2 class="Titulo">Nuestros Productos</h2>

    <br>
        
    <?php 
            //si no existe metodo get redirige a pag 1
            if(!$_GET) {
                header('Location:productos.php?pagina=1');
            }

            //si se pone en la barra mas paginas de las que son, Saldra un error 
            if($_GET['pagina']>= $paginas || $_GET['pagina']<= 0) {
                echo '<h2 style="margin-top:3rem; margin-bottom:5rem;" ><strong>UPS!!, Parece que algo a salido mal.</strong></h2>';
            }

            
            $iniciar = ($_GET['pagina']-1)*$producto_por_pagina;

            $sql_productos = 'SELECT producto.IDProd,producto.NombreProd, producto.Size, 
                                producto.CantidadTotalP, producto.Precio,imagen_producto.Imagen,
                                (SELECT COUNT(*)FROM producto 
                                WHERE producto.IDProd = producto.IDProd) AS rs
                                FROM producto 
                                INNER JOIN imagen_producto ON
                                producto.IDProd =imagen_producto.IDProd
                                limit :iniciar, :nProductos';

            $sentencia_productos = $cnn->prepare($sql_productos);
            $sentencia_productos->bindParam(':iniciar', $iniciar, PDO::PARAM_INT);
            $sentencia_productos->bindParam(':nProductos', $producto_por_pagina, PDO::PARAM_INT);
            $sentencia_productos->execute();

            $resultado_productos = $sentencia_productos->fetchAll();

    ?>

    <!-- contenedor de los productos -->
    <div class="row">                 
        <?php foreach($resultado_productos as $prod): ?>
                <div class="col-4" href="#">  
                    
                <div>
                        <input type="hidden" value="<?php echo $prod['IDProd']; ?>">

                        <img class="zoom img" loading="lazy" style="width: 500; height: 300px;"  
                        src="<?php echo $prod['Imagen']; ?>" 
                        alt="<?php echo $prod['NombreProd'] ?>">

                        <br>
                        
                        <h4><?php echo utf8_encode($prod['NombreProd']);?></h4>
                        
                        <h6>Aprox: <?php echo utf8_encode($prod['Size']);?></h6>
                        
                        <div class="rating">
                            <!--PARA QUE SALGAN ESTRELLAS DE QUE SIMULEN UNA CALIFICACION-->
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>


                        <h4> 
                            <span>
                            ₡ <?php echo $prod['Precio'];?>
                            </span>
                        </h4> 

                        <?php 
                            if ($prod['CantidadTotalP'] > 0) {?>
                                <form action="<?php echo RUTA . 'seccion/agregarCarrito.php'?>" method="POST">
                                    <input type="hidden" name="prod" value="<?php echo $prod['IDProd'];?>">
                                    <input type="hidden" name="img" value="<?php echo $prod['Imagen'];?>">
                                    <input type="hidden" name="nombre" value="<?php echo $prod['NombreProd'];?>">
                                    <input type="hidden" name="precio" value="<?php echo $prod['Precio'];?>">

                                    <input class="boton" type="submit" name="agregar" value="Añadir">                      
                                </form>
                            <?php } else {?>
                                <div class="boton2">Producto Agotado</div>
                            <?php }
                        ?> 

                    </div>

                </div>
            
        <?php endforeach; ?>
    </div>


</div>
