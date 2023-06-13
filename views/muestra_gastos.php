
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
    $idSeccion = substr($id, 8); 
    // Preparamos la consulta requerida
    $strART = "SELECT * FROM `datosgastos` WHERE `grupo` LIKE ?";
    $stmt = $con->prepare($strART);
    // Ejecutamos la consulta, pasando el valor del parámetro con un comodín
    $stmt->execute(array("%$idSeccion%"));
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
      <form id="metedatos" class="formulario">
          <table class ="formulario__tabla">
              <tr>
                <td>
                  <input type="hidden" value="" name="concepto" id="nombre">
                </td>
                <td>
                  <input type="hidden" value="vacio" name="imagen">
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
                  <input type="number" step="0.01" pattern="[0-9]{0,7}\,[0-9]{2}" name="cantidad" class="disableable">
                  </td>
              </tr> 
              <tr>
                  <td>  
                      Observaciones: 
                  </td>
                  <td>
                      <textarea form="metedatos" name="nota" class="disableable"></textarea>
                  </td>
              </tr> 
             
          </table>
          <table class="formulario__botones">
              <tr>
                  <td> 
                      <input name="Enviar" value="CORRECTO" >  
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