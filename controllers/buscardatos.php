
<div class="contenedor">    
    <div class="caja">
        <div class="caja__titulo">
            <p class="caja__titulo-cabeza">Aqui tienes tu resultado</p>
        </div>
        <div class="caja__textos">
<?php
    $tipo = $_POST['tipo'];
    $grupo = $_SESSION['grupo'];
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
            filtroMesAnoDatos($con, $tipo, $grupo, $fecha_inicio, $fecha_fin);
        break;
        // Si se ha elegido agrupar por año
        case "sino":
            filtroAnoDatos($con, $tipo, $grupo, $fecha_inicio, $fecha_fin);
            break;
        // Si se ha elegido agrupar por mes
        case "nosi":
            filtroMesDatos($con, $tipo, $grupo, $fecha_inicio, $fecha_fin);
            break;
        // Snin filtro de grupo
        default:
            filtroCompletoDatos($con, $tipo, $grupo, $fecha_inicio, $fecha_fin, $nombre_usuario, $concepto, $grupo_concepto);
    }
?>
        </div>
    </div> 
</div>