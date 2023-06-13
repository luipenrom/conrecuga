
<div class="contenedor">    
    <div class="caja">
        <div class="caja__titulo">
            <p class="caja__titulo-cabeza">Bueno, cómo están los máquinas, lo primero de todo.</p>
        </div>
        <div class="caja__textos">
            <p>Aquí no echamos fotillos, pero puedes ver los datos que te interesen</p>
            <p>Te proponemos un formulario para obterner los datos que quieras. Simplemente elige, confirma y los tendrás</p>
            <p>Ten en cuenta que para mostrar la gráfica, se agrupan los datos por meses, años, o combinado. Si no seleccionas nada, agrupará la información por mes y año</p>
        </div>
        <div class="caja__textos">
            <?php 
                $id = $_GET['id'];
                $grupo = $_SESSION['grupo'];
                $idSeccion = substr($id, 8); 
                $idfiltro = 'datos' . $idSeccion;
            ?>
            <form action="principal.php?id=graficasbuscar" method="POST" class="formudatos">
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
            </form>
        </div>
    </div> 
    <script src="js/filtrodatos.js"></script>  
</div>    