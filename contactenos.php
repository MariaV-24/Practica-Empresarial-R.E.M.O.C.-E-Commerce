<?php
    require('headerr.php');
?>

<h2 class="Titulo">Contacto</h2>
        <div class="contacto-bg"></div> <!--Imagen de fondo-->

        <form method="post" action="correo.php" class="form1">
            <div class="contenedor-campos">
                <div class="campo">
                    <label class="" for="nombre">Nombre</label>
                    <input 
                        class="input-text"
                        type="text" 
                        name="name"
                        placeholder="Tu Nombre" 
                        id="nombre" 
                        onblur="ValidarNombre()"
                    >              
                    <img id="nombreAlert" 
                        src="images/iconos/alert.png" 
                        class="icon-hide" 
                        alt="alert.pngaValidacion" 
                        title="Este campo es necesario" />
                </div>

                <div class="campo">
                    <label class="" for="asunto">Asunto</label>
                    <input
                        class="input-text"
                        type="text" 
                        name="asunto"
                        placeholder="Asunto" 
                        id="asunto"
                        onblur="ValidarAsunto()"
                    > 
                    <img id="asuntoAlert" 
                        src="images/iconos/alert.png" 
                        class="icon-hide" 
                        alt="alert.pngaValidacion" 
                        title="Este campo es necesario" />
                </div>

                <div class="campo">
                    <label class="" for="email">E-mail</label>
                    <input 
                        class="input-text2"
                        type="email" 
                        name="correo"
                        placeholder="Tu E-mail" 
                        id="email"
                        onblur="ValidarCorreo()"
                    > 
                    <img id="emailAlert" 
                        src="images/iconos/alert.png" 
                        class="icon-hide" 
                        alt="alert.pngaValidacion" 
                        title="Digite un correo válido" />
                </div>

                <div class="campo">
                    <label class="" for="mensaje">Mensaje</label>
                    <textarea class="input-text2" 
                            id="mensaje"
                            name="msj"
                            onblur="ValidarMensaje()"></textarea> 

                    <img id="mensajeAlert" 
                        class="icon-hide"
                        src="images/iconos/alert.png" 
                        alt="alert.pngaValidacion" 
                        title="Por favor escriba un mensaje" />
                </div>

                <div class="campo">
                    <input id="btnEnviar" 
                        type="submit" 
                        name="enviar"
                        value="Enviar" 
                        class="boton" 
                        onclick="return ValidarContactenos()">
                </div>
            </div>
        </form>

        <br><br>
<?php
    require('footer.php');
?>