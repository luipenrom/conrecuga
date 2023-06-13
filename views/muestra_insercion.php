
<!-- Título de la página -->
    <div class="contenedor">    
        <div class="caja">
            <div class="caja__titulo">
                <p class="titulos__secciones">Selecciona qué tipo de dato quieres añadir</p>
            </div>
            <div class="caja__honeycomb">
    <!-- Abrimos llaves de php, y comenzamos a crear las celdillas en función del contenido de la sección seleccionada-->            
                <?php
                    $id = $_GET['id'];
                    $idSeccion = substr($id, 7); 
                    $strART = "SELECT DISTINCT (`grupo`) FROM datos$idSeccion"; 
                    $stmt = $con->prepare($strART); 
                    $stmt->execute(); 
                    $elementos = $stmt->fetchAll(PDO::FETCH_ASSOC); 
                        echo '<ul class="honeycomb">'; 
                    // Recorrer los resultados y mostrarlos 
                        foreach ($elementos as $fila) { 
                            echo '<li id="' . $fila["grupo"] . '" class="honeycomb-cell">';
                            echo '<img class="honeycomb-cell_image" src="img/' . $fila["grupo"] . '.png" alt="' . $fila["grupo"] . '">';
                            echo '<div class="honeycomb-cell_title">' . $fila["grupo"] . '</div>';
                            echo '</li>';}
                ?>   
                <!-- Cerramos la lista -->
                            <li class="honeycomb-cell honeycomb_placeholder">
                            </li>
                        </ul>         
            </div>
        </div> 
    </div>
<!-- Llamamos al script que nos permitirá dejar únicamente visible la celdilla seleccionada, y mostrará el formulario de introduccion de datos -->
<script src="js/<?php echo $id ?>.js"></script>