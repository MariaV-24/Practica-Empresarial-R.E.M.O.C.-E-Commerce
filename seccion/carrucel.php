<!-- Carrucel -->
<div id="carrucel" class="small-container">
    <h2 class="Titulo"><strong>Productos Destacados</strong></h2>

    <div class="contenedor owl-carousel owl-theme">
        <?php foreach($resultado_destacados as $prod): ?>
        <div class="item">

            <input type="hidden" value="<?php echo $prod['IDProd']; ?>">

            <img class="zoom img carrucelAjustes" loading="lazy" src="<?php echo $prod['Imagen']; ?>"
                alt="<?php echo $prod['NombreProd'] ?>">
            <br>

            <h4><?php echo utf8_encode($prod['NombreProd']);?>
            
            <h6>Aprox: <?php echo utf8_encode($prod['Size']);?></h6>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
            </h4>

            <h4>
                <span>
                    ₡ <?php echo $prod['Precio'];?>
                </span>
            </h4>
            <?php 
            if ($prod['CantidadTotalP'] > 0) {?>
                <form action="<?php echo RUTA . 'seccion/indexCarrito.php'?>" method="POST">
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
        <?php endforeach; ?>
    </div>
</div>