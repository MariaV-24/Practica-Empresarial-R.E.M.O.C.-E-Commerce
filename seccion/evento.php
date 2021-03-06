<section class="seccion contenedor">
    <div class="calendario">
        <h3>Calendario de Eventos</h3>
        
        
            <?php foreach($resultadoEventos as $evento): ?>
            <div class="dia">

                <!-- utf8_encode() *** esto es para que permita acentos -->
                <p class="titulo"><?php echo utf8_encode($evento['TituloEvento']);?></p>


                <p class="hora">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-event"
                        width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <rect x="4" y="5" width="16" height="16" rx="2" />
                        <line x1="16" y1="3" x2="16" y2="7" />
                        <line x1="8" y1="3" x2="8" y2="7" />
                        <line x1="4" y1="11" x2="20" y2="11" />
                        <rect x="8" y="15" width="2" height="2" />
                    </svg>

                    <?php echo $evento['FechaEvento'];?>
                </p>

                <p class=""><?php echo $evento['DescripcionEvento'];?></p>

                <!-- Ubicacion -->
                <p>
                    <svg xmlns="http://www.w3.org/2000/svg" 
                        class="icon icon-tabler icon-tabler-map-pin" 
                        width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <circle cx="12" cy="11" r="3" />
                        <path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" />
                    </svg>

                    <?php echo $evento['Ubicacion'];?>
                </p>

                <!-- ********************************************************************************************** -->
            </div>
            <?php endforeach; ?>
        

    </div>
    <!--.calendario-->

</section>