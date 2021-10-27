 <!-- Ultimos Productos -->
 <div class="Products/p20.webp-container ultProd" style="margin-top: 20px;">
    <h2 class="Titulo"><strong>Ultimos Productos</strong></h2>
    <br>
        <div class="row">
            <?php foreach($resultado_nuevos as $prod): ?>
                    <div class="col-4" href="ProdAmpliado.php">  
                        
                        <div>
                            <input type="hidden" value="<?php echo $prod['IDProd']; ?>">
                            
                            <img class="zoom img" loading="lazy" style="width: 500; height: 200px;" 
                            src="<?php echo $prod['Imagen']; ?>" 
                            alt="<?php echo $prod['NombreProd'] ?>">
                            
                            <br>

                            <h4><?php echo utf8_encode($prod['NombreProd']);?></h4>

                            <h6>Aprox: <?php echo utf8_encode($prod['Size']);?></h6>
                            
                                <div class="rating">
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

                            <br>

                            <!-- <a href="#?id=<?php echo $prod['IDProd']?>" class="boton"
                            style="text-decoration:none; color: #fff;">Añadir</a> -->
                            <?php 
                            if ($prod['CantidadTotalP'] > 0) {?>
                                <form action="<?php echo RUTA . 'seccion/indexCarrito.php'?>" method="POST" style="margin-top: -20px;">
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
