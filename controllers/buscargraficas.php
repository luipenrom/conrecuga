
<div class="contenedor">    
    <div class="caja">
        <div class="caja__titulo">
            <p class="caja__titulo-cabeza">Aqui tienes tu resultado</p>
        </div>
        <div class="caja__textos">
        <div id="myDiv" style="width: 100%; height: 100%;"></div>
<?php
    $grupo = $_SESSION['grupo'];
    $tipo = $_POST['tipo'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_fin = $_POST['fecha_fin'];
    $nombre_usuario = $_POST['usuario'] ?? "no";
    $concepto = $_POST['concepto'] ?? "no";
    $grupo_concepto = $_POST['grupo_concepto'] ?? "no";
    $agrupa_ano = $_POST['agrupa_ano'] ?? "no";
    $agrupa_mes = $_POST['agrupa_mes'] ?? "no";
    switch ($agrupa_ano . $agrupa_mes) {
    //switch ($agrupa_ano . $agrupa_mes) {
        // Si se ha elegido agrupar por año y mes
        case "sisi":        
            graficaMesAnoGraficas($con, $tipo, $grupo, $fecha_inicio, $fecha_fin);
        break;
        // Si se ha elegido agrupar por año
        case "sino":
            graficaAnoGraficas($con, $tipo, $grupo, $fecha_inicio, $fecha_fin);
            break;
        // Si se ha elegido agrupar por mes
        case "nosi":
            graficaMesGraficas($con, $tipo, $grupo, $fecha_inicio, $fecha_fin);
            break;
        // Snin filtro de grupo
        default:
            graficaMesAnoGraficas($con, $tipo, $grupo, $fecha_inicio, $fecha_fin);
    }
    // Declaramos el Array para guardar dato
    $strART = $_SESSION['datoGrafica'];
    $valores = array();
    // Preparamos y ejecutamos la consulta
    $stmt = $con->prepare($strART); 
    $stmt->execute($valores); 
    $elementos = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    // Declaramos el array para almacenar valores 
    $valoresX = array();
    $valoresV = array();
    $valoresL = array();
    $valoresC = array();
    foreach ($elementos as $fila) {
        if (!in_array($fila["fecha"], $valoresX)) {
            $valoresX[] = $fila["fecha"];
        }
        if ($fila["nombre"] == 'Vicky') {
            $valoresV[] = $fila["total"];
        } else if ($fila["nombre"] == 'Luis') {
            $valoresL[] = $fila["total"];
        } else {
            $valoresC[] = $fila["total"];
        }
    }

    $datosX=json_encode($valoresX);
    $datosV=json_encode($valoresV);
    $datosL=json_encode($valoresL);
    $datosC=json_encode($valoresC);
?>
    <script>
        // Obtenemos los datos de la consulta
        var fechas = <?php echo json_encode($valoresX); ?>;
        var valoresV = <?php echo json_encode($valoresV); ?>;
        var valoresL = <?php echo json_encode($valoresL); ?>;
        var valoresC = <?php echo json_encode($valoresC); ?>;

        // Crear trazas para cada nombre
        var traceV = {
            x: fechas,
            y: valoresV,
            name: 'Vicky',
            type: 'bar'
        };

        var traceL = {
            x: fechas,
            y: valoresL,
            name: 'Luis',
            type: 'bar'
        };

        var traceC = {
            x: fechas,
            y: valoresC,
            name: 'Conjunto',
            type: 'bar'
        };

        var data = [traceV, traceL, traceC];

        // Configuración del gráfico
        var layout = {
            title: 'Gráfico de barras agrupado',
            xaxis: {
                title: 'Fechas'
            },
            yaxis: {
                title: 'Total'
            },
            barmode: 'group'
        };

        // Crear el gráfico
        Plotly.newPlot('myDiv', data, layout);
    </script>

        </div>
    </div> 
</div>
