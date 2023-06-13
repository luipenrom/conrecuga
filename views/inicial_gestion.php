
<?php $id = $_GET['id']; ?>
<div class="contenedor">    
    <div class="caja">
        <div class="caja__titulo">
            <p class="titulos__secciones">Bienvenid@ a la sección <?php echo $id ?> </p>
        </div>
        <div class="caja__textos">
            <p>Empieza eligiendo una categoría</p>
        </div>
        <div class="caja__honeycomb">
            <ul class="honeycomb">
                <!-- Figura 1 [INICIO]-->
                <li class="honeycomb-cell">
                <!-- >>>>>>>>>> ENLACE <<<<<<<<<< -->    
                    <a href="principal.php?id=<?php echo $id ?>ingresos">                    
                        <img class="honeycomb-cell_image" src="img/ingresos.png" alt="ingresos">
                        <div class="honeycomb-cell_title">
                <!-- ********** TEXTO DE HEXÁGONO ********** -->   
                                INGRESOS
                        </div>
                    </a>        
                </li>
                <!-- Figura 1 [FIN]-->    
                <!-- Figura 2 [INICIO]-->
                <li class="honeycomb-cell">
                <!-- >>>>>>>>>> ENLACE <<<<<<<<<< -->    
                    <a href="principal.php?id=<?php echo $id ?>gastos">
                        <img class="honeycomb-cell_image" src="img/gastos.png" alt="gastos">
                        <div class="honeycomb-cell_title">   
                <!-- ********** TEXTO DE HEXÁGONO ********** -->
                            GASTOS
                        </div>
                    </a>
                </li>
                <!-- Figura 2 [FIN]-->
                <!-- Figura 3 [INICIO]-->
                <li class="honeycomb-cell">
                <!-- >>>>>>>>>> ENLACE <<<<<<<<<< -->    
                    <a href="principal.php?id=<?php echo $id ?>compras">                    
                        <img class="honeycomb-cell_image" src="img/compras.png" alt="compras">
                        <div class="honeycomb-cell_title">  
                <!-- ********** TEXTO DE HEXÁGONO ********** -->
                            COMPRAS
                        </div>
                    </a>
                </li>
                <!-- Figura 3 [FIN]-->
            </ul>
        </div>
    </div> 
</div>    