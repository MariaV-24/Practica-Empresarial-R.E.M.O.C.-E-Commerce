
<!-- PAGINACION -->
<section class="paginacion" style="text-align: center;">
    
        <nav aria-label="Page navigation example">
                <ul class="paginacion">

                    <li class="page-item
                        <?php echo $_GET['pagina']<=1 ? 'disabled' : "" ?>"
                    >
                    <a class="page-link" 
                        href="productos.php?pagina=<?php echo $_GET['pagina']-1?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                    </li>



                    <?php for ($i=1; $i < $paginas; $i++): ?> 	
                        <li class="espacios page-item
                                    <!-- ↓ El siguiente codigo es para que se note en cual pagina esta actualmente -->
                                    <?php echo $_GET['pagina']== $i ? 'active' : "" ?>"
                        >
                            <a class="page-link" 
                                href="productos.php?pagina=<?php echo "$i";?>"> 
                                <?php echo "$i";?>
                            </a>
                        </li>
                    <?php endfor?> 
                    

                    
                    
                    <li class="espacios page-item
                            <?php echo $_GET['pagina']>= $paginas-1 ? 'disabled' : "" ?>"
                    >
                        <a class="page-link" 
                            href="productos.php?pagina=<?php echo $_GET['pagina']+1?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>

                </ul>
        </nav>
</section>

