<!-- Introducción de datos -->
<section class="contenedor">    
    <div class="caja">
        <div class="caja__titulo">
            <p class="titulos__secciones">introducción de datos</p>
        </div>
        <div class="caja__honeycomb">
    <?php
        if ($_SESSION['rol'] == 1 || $_SESSION['rol'] == 2 || $_SESSION['rol'] == 3) {
            insercionDatos($id);
        }else{
            insercionMuestra($id);
        }
    ?> 
        </div>
    </div> 
<!-- GESTION DE DATOS -->
    <div>
            <div class="caja__titulo">
                <p class="titulos__secciones">GESTI&Oacute;N DE DATOS</p>
            </div>
            <div class="caja__honeycomb">
        <?php
            if ($_SESSION['rol'] == 2 || $_SESSION['rol'] == 1) {
              gestionDatos($id);
          }else{
              gestionMuestra($id);
          }
        ?> 
        </div>
    </div>
</section> 