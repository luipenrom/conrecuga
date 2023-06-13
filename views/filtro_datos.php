
<div class="contenedor">    
    <div class="caja">
        <div class="caja__titulo">
            <p class="caja__titulo-cabeza">Bueno, cómo están los máquinas, lo primero de todo.</p>
        </div>
        <div class="caja__textos">
            <p>Aquí no echamos fotillos, pero puedes ver los datos que te interesen</p>
            <p>Te proponemos un formulario para obterner los datos que quieras. Simplemente elige, confirma y los tendrás</p>
        </div>
        <div class="caja__textos">
            <?php 
                $id = $_GET['id'];
                $grupo = $_SESSION['grupo'];
                $idSeccion = substr($id, 5); 
            ?>
            <form action="principal.php?id=datosbuscar" method="POST" class="formudatos">
                <!-- Ponemos los filtros al principio para mejorar la usabilidad -->
                <button type="submit">Mostrar</button>
                <button type="reset">Limpiar</button>
                <!-- Primero elegimos qué tipo de dato necesitamos --> 
                <label for="fecha_inicio">Vas a buscar en:</label>
                <input type="text" name="tipo" value="<?php echo $idSeccion ?>" readonly>

                <!-- Restringimos fecha de inicio -->
                <label for="fecha_inicio">Empezando en:</label>
                <input type="date" id="fecha_inicio" name="fecha_inicio">

                <!-- Restringimos fecha de fin -->
                <label for="fecha_fin">Acabando en:</label>
                <input type="date" id="fecha_fin" name="fecha_fin">

                <!-- Damos opción de agrupar por años -->
                <label for="fecha_fin">¿Quieres agrupar la información por años?:</label>
                <input type="checkbox" id="agrupa_ano" name="agrupa_ano" value="si">

                <!-- Damos opción de agrupar por meses -->
                <label for="fecha_fin">¿Quieres agrupar la información por meses?:</label>
                <input type="checkbox" id="agrupa_mes" name="agrupa_mes" value="si"> 

                <!-- Selección de usuario -->
                <label for="usuario">Quieres ver información general o sólo o aportado/gastado por:</label>
                <select id="usuario" name="usuario" class="disableable">
                    <!-- Opción para no filtrar por usuario -->
                    <option value="">Todos</option>
                    <!-- Opciones para cada usuario, obtenidas de la base de datos -->
                    <?php
                        // Consulta a la base de datos para obtener los usuarios
                        $stmt = $con->prepare("SELECT nombre FROM usuarios WHERE grupo = '$grupo'"); 
                        $stmt->execute(); 
                        // Imprimimos tantas opciones como usuarios haya en el sistema en nuestro grupo
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value='" . $row['nombre'] . "'>" . $row['nombre'] . "</option>";
                        }
                    ?>
                </select>

                <!-- Selección de concepto -->
                <label for="concepto">Quieres un concepto en concreto, y lo quieres general:</label>
                <select id="concepto" name="concepto" class="disableable">
                    <!-- Opción para no filtrar por concepto -->
                    <option value="">Todos</option>
                    <!-- Opciones para cada concepto, obtenidas de la base de datos -->
                    <?php
                        // Preparas y ejecutas una consulta para obtener los conceptos
                        $stmt = $con->prepare("SELECT concepto FROM $id"); 
                        $stmt->execute(); 
                        // Recorres los resultados y creas una opción por cada concepto
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value='" . $row['concepto'] . "'>" . $row['concepto'] . "</option>";
                        }
                    ?>
                </select>

                <!-- Selección de grupo-->
                <label for="grupo_concepto">Quieres buscar por grupos. Este es tu apartado:</label>
                <select id="grupo_concepto" name="grupo_concepto" class="disableable">
                    <!-- Opción para no filtrar por concepto -->
                    <option value="">Todos</option>
                    <!-- Opciones para cada concepto, obtenidas de la base de datos -->
                    <?php
                        // Preparas y ejecutas una consulta para obtener los conceptos
                        $stmt = $con->prepare("SELECT DISTINCT grupo FROM $id"); 
                        $stmt->execute(); 
                        // Recorres los resultados y creas una opción por cada concepto
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value='" . $row['grupo'] . "'>" . $row['grupo'] . "</option>";
                        }
                    ?>
                </select>
            </form>
        </div>
    </div> 
    <script src="js/filtrodatos.js"></script>  
</div>    