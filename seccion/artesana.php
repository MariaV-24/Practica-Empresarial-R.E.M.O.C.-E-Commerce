<h1 class="Titulo">Nuestras Artesanas</h1>

<section class="row">
        <div class="artesana">              
            <?php foreach($resultadoArt as $artes): ?>    
                    <div class="polaroid containerrr">
                        <img class="img" loading="lazy" 
                        src="<?php echo $artes['Imagen'];?>" 
                        alt="Img">
                        <!-- <p><?php echo $artes['CodigoArtesana'];?></p> -->
                        <p style="margin-top: 10px;"><?php echo utf8_encode($artes['NombreArtesana']) ." ";?><?php echo utf8_encode($artes['ApellidoArtesana']);?></p>
                    </div>                    
            <?php endforeach; ?>          
        </div>
</section>
