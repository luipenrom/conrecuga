
<!-- Título de la página -->
<div class="contenedor">    
    <div class="caja">
        <div class="caja__titulo">
            <p class="titulos__secciones">Ya casi lo tienes, un click más, y a rellenar</p>
        </div>
        <div class="caja__honeycomb">
<!-- Abrimos llaves de php, y comenzamos a crear las celdillas en función del contenido de la sección seleccionada-->       
<?php
    if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Preparamos la consulta requerida
    $strART = "SELECT * FROM `datosingresos` WHERE `grupo` LIKE ?";
    $stmt = $con->prepare($strART);
    // Ejecutamos la consulta, pasando el valor del parámetro con un comodín
    $stmt->execute(array("%$id%"));
    // Obtenemos los resultados
    $elementos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo '<ul class="honeycomb">';
    // Recorremos los resultados y los mostramos
    foreach ($elementos as $fila) {
        echo '<li id="' . $fila["id"] . '" class="honeycomb-cell">';
        echo '<img class="honeycomb-cell_image" src="img/' . $fila["imagen"] . '">';
        echo '<div class="honeycomb-cell_title">' . $fila["concepto"] . '</div>';
        echo '</li>';
    }
    } else {
    // No se ha pasado el parámetro id
        echo "Aaaaaaalgo no cuadra!!!";
    }
?>
<!-- Cerramos la lista -->
        <li class="honeycomb-cell honeycomb_placeholder">
        </li>
    </ul>
<!-- Creamos el formulario que servirá para la introdución de datos -->
    <div class="caja__textos">
      <form id="metedatos" class="formulario" name="formDatos" method="post" action="controllers/insertaringreso.php" enctype="multipart/form-data">
          <table class ="formulario__tabla">
              <tr>
                <td>
            <!-- De forma automática, el sistema rellenará el código del concepto seleccinado via JS -->        
                  <input type="hidden" value="" name="concepto" id="nombre" required>
                </td>
                <td>
            <!-- De momento, no se permite la introduccion de imagenes con tickets de la compra -->
                </td>
              </tr>
              <tr>
                  <td>
                      Fecha:  
                  </td>
                  <td>
                      <input type="date" name="fecha" required>
                  </td>
              </tr> 
              <tr>
                  <td>  
                    Cantidad: 
                  </td>
                  <td>
                    <input type="number" step="0.01" pattern="[0-9]{0,7}\,[0-9]{2}" name="cantidad" required>
                  </td>
              </tr> 
              <tr>
                  <td> 
                    &ast;Bruto: 
                  </td>
                  <td>
                  <input type="number" step="0.01" pattern="[0-9]{0,7}\,[0-9]{2}" name="neto">
                  </td>
              </tr> 
              <tr>
                  <td>
                    &ast;I.R.P.F.: 
                  </td>
                  <td>
                  <input type="number" step="0.01" pattern="[0-9]{0,7}\,[0-9]{2}" name="irpf">
                  </td>
              </tr> 
              <tr>
                  <td>  
                      Observaciones: 
                  </td>
                  <td>
                      <textarea form="metedatos" name="nota"></textarea>
                  </td>
              </tr> 
              <tr>
                  <td colspan="2">  
                    &ast;<small><i>no es obligatorio rellenarlos</i></small> 
                  </td>
              </tr>
          </table>
          <table class="formulario__botones">
              <tr>
                  <td> 
                      <input name="Enviar" value="CORRECTO" type="submit">  
                  </td>
                  <td>
                      <input name="Borrar" value="DÉJALO" type="reset">
                  </td>
              </tr>
          </table>
      </form>    
  </div>  
<!-- Llamamos al script que nos permitirá dejar únicamente visible la celdilla seleccionada, y mostrará el formulario de introduccion de datos -->
<script src="js/honeycomb.js"></script>    