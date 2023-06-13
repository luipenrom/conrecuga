<?php
function filtroCompletoDatos($con, $tipo, $grupo, $fecha_inicio, $fecha_fin, $nombre_usuario, $concepto, $grupo_concepto){
    $grupo = $_SESSION['grupo'];
    $tipo = $_POST['tipo'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_fin = $_POST['fecha_fin'];
    $nombre_usuario = $_POST['usuario'];
    $concepto = $_POST['concepto'];
    $grupo_concepto = $_POST['grupo_concepto'];
    $agrupa_ano = $_POST['agrupa_ano'] ?? "no";
    $agrupa_mes = $_POST['agrupa_mes'] ?? "no";
    $strART = "SELECT u.nombre AS nombre, i.concepto AS concepto, fecha, qty, nota, d.grupo AS grupo_concepto
    FROM $tipo x
    JOIN usuarios u ON x.usuario = u.id
    JOIN datos$tipo i ON x.concepto = i.id
    INNER JOIN datos$tipo d ON i.concepto = d.concepto
    WHERE u.grupo = '$grupo'";
    // Declaramos el Array para guardar datos
        $valores = [];
    // Comenzamos a comprobar qué se ha seleccionado
        // Fechas inicio
        if ($fecha_inicio) {
            $strART .= " AND fecha >= ?";
            $valores[] = $fecha_inicio;
        }
        // Fecha fin
        if ($fecha_fin) {
            $strART .= " AND fecha <= ?";
            $valores[] = $fecha_fin;
        }
        // Usuario
        if ($nombre_usuario) {
            $strART .= " AND u.nombre = ?";
            $valores[] = $nombre_usuario;
        }
        // Concepto
        if ($concepto) {
            $strART .= " AND i.concepto = ?";
            $valores[] = $concepto;
        }
        // Grupo
        if ($grupo_concepto) {
            $strART .= " AND d.grupo = ?";
            $valores[] = $grupo_concepto;
        }
        // Ordenación de resultados por fecha
            $strART .= " ORDER BY fecha";
        // Preparamos y ejecutamos la consulta
            $stmt = $con->prepare($strART); 
            $stmt->execute($valores); 
            $elementos = $stmt->fetchAll(PDO::FETCH_ASSOC); 
            try{echo '<table class="tabladatos">
                        <tr>
                            <th>Usuario</th>
                            <th>Concepto</th>
                            <th>Grupo</th>
                            <th>Fecha</th>
                            <th>Cantidad</th>
                            <th>Observaciones</th>
                        </tr>';
            // Recorrer los resultados y mostrarlos 
                foreach ($elementos as $fila) { 
                    echo '<tr>';
                        echo '<td>' . $fila["nombre"] . '</td>';
                        echo '<td>' . $fila["concepto"] . '</td>';
                        echo '<td>' . $fila["grupo_concepto"] . '</td>';
                        echo '<td>' . $fila["fecha"] . '</td>';
                        echo '<td>' . $fila["qty"] . ' &#8364;</td>';
                        echo '<td>' . $fila["nota"] . '</td>';
                    echo '</tr>';
                ;}
                echo '</table>'; 
                } catch (Exception $e) {
                    echo 'Creo que el filtro que has seleccionado no contiene datos. Por favor, prueba con otro';
                }
}
function filtroMesAnoDatos($con, $tipo, $grupo, $fecha_inicio, $fecha_fin){
    $tipo = $_POST['tipo'];  
    $grupo = $_SESSION['grupo'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_fin = $_POST['fecha_fin'];
    $strART = "SELECT u.nombre AS nombre, DATE_FORMAT(i.fecha, '%m-%Y') AS fecha, SUM(i.qty) AS total, MIN(i.fecha) AS fecha_min
                FROM usuarios u
                JOIN $tipo i ON u.id = i.usuario            WHERE u.grupo = '$grupo'";
    // Fechas inicio-final si se marcan en el filtro
    if ($fecha_inicio && $fecha_fin) {
        $strART .= " AND i.fecha BETWEEN '$fecha_inicio' AND '$fecha_fin'";
    }
    $strART .= " GROUP BY u.nombre, DATE_FORMAT(i.fecha, '%m-%Y'), YEAR(i.fecha)
                 ORDER BY fecha_min";
    
    // Declaramos el array para almacenar valores             
    $valores = [];
    // Preparamos y ejecutamos la consulta
    $stmt = $con->prepare($strART); 
    $stmt->execute($valores); 
    $elementos = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    try{echo '<table class="tabladatos">
                <tr>
                    <th>Usuario</th>
                    <th>Mes</th>
                    <th>Total</th>
                </tr>';
          // Recorrer los resultados y mostrarlos 
        foreach ($elementos as $fila) { 
            echo '<tr>';
                echo '<td>' . $fila["nombre"] . '</td>';
                echo '<td>' . $fila["fecha"] . '</td>';
                echo '<td>' . $fila["total"] . ' &#8364;</td>';
            echo '</tr>';
        ;}
        echo '</table>'; 
    } catch (Exception $e) {
        echo 'Creo que el filtro que has seleccionado no contiene datos. Por favor, prueba con otro';
    }
}
function filtroAnoDatos($con, $tipo, $grupo, $fecha_inicio, $fecha_fin){
    $tipo = $_POST['tipo'];  
    $grupo = $_SESSION['grupo'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_fin = $_POST['fecha_fin'];
    $strART = "SELECT u.nombre AS nombre, YEAR(i.fecha) AS ano, SUM(i.qty) AS total, MIN(i.fecha) AS fecha_min
                FROM usuarios u
                JOIN $tipo i ON u.id = i.usuario
                WHERE u.grupo = '$grupo'";
    // Fechas inicio-final si se marcan en el filtro
    if ($fecha_inicio && $fecha_fin) {
        $strART .= " AND i.fecha BETWEEN '$fecha_inicio' AND '$fecha_fin'";
    }
    $strART .= " GROUP BY u.nombre, YEAR(i.fecha)
                ORDER BY fecha_min";
    
    
    // Declaramos el Array para guardar datos                
    $valores = [];
    // Preparamos y ejecutamos la consulta
    $stmt = $con->prepare($strART); 
    $stmt->execute($valores); 
    $elementos = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    try{echo '<table class="tabladatos">
                <tr>
                    <th>Usuario</th>
                    <th>Año</th>
                    <th>Total</th>
                </tr>';
          // Recorrer los resultados y mostrarlos 
        foreach ($elementos as $fila) { 
            echo '<tr>';
                echo '<td>' . $fila["nombre"] . '</td>';
                echo '<td>' . $fila["ano"] . '</td>';
                echo '<td>' . $fila["total"] . ' &#8364;</td>';
            echo '</tr>';
        ;}
        echo '</table>'; 
    } catch (Exception $e) {
        echo 'Creo que el filtro que has seleccionado no contiene datos. Por favor, prueba con otro';
    }
}
function filtroMesDatos($con, $tipo, $grupo, $fecha_inicio, $fecha_fin){
    $tipo = $_POST['tipo'];  
    $grupo = $_SESSION['grupo'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_fin = $_POST['fecha_fin'];
    $strART = "SELECT u.nombre AS nombre, MONTH(i.fecha) AS mes, SUM(i.qty) AS total, MIN(i.fecha) AS fecha_min
                FROM usuarios u
                JOIN $tipo i ON u.id = i.usuario
                WHERE u.grupo = '$grupo'";
    // Fechas inicio-final si se marcan en el filtro
    if ($fecha_inicio && $fecha_fin) {
        $strART .= " AND i.fecha BETWEEN '$fecha_inicio' AND '$fecha_fin'";
    }                
    $strART .= " GROUP BY u.nombre, MONTH(i.fecha), YEAR(i.fecha)
                ORDER BY fecha_min";
            
    // Declaramos el Array para guardar datos                 
    $valores = [];
        // Preparamos y ejecutamos la consulta
        $stmt = $con->prepare($strART); 
        $stmt->execute($valores); 
        $elementos = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        try{echo '<table class="tabladatos">
                    <tr>
                        <th>Usuario</th>
                        <th>Mes</th>
                        <th>Total</th>
                    </tr>';
              // Recorrer los resultados y mostrarlos 
            foreach ($elementos as $fila) { 
                echo '<tr>';
                    echo '<td>' . $fila["nombre"] . '</td>';
                    echo '<td>' . $fila["mes"] . '</td>';
                    echo '<td>' . $fila["total"] . ' &#8364;</td>';
                echo '</tr>';
            ;}
            echo '</table>'; 
        } catch (Exception $e) {
            echo 'Creo que el filtro que has seleccionado no contiene datos. Por favor, prueba con otro';
        }
}

function graficaMesAnoGraficas($con, $tipo, $grupo, $fecha_inicio, $fecha_fin){
    $tipo = $_POST['tipo'];  
    $grupo = $_SESSION['grupo'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_fin = $_POST['fecha_fin'];
    $strART = "SELECT u.nombre AS nombre, DATE_FORMAT(i.fecha, '%Y-%m') AS fecha, SUM(i.qty) AS total
                FROM usuarios u
                JOIN $tipo i ON u.id = i.usuario
                WHERE u.grupo = '$grupo'";
    // Fechas inicio-final si se marcan en el filtro
    if ($fecha_inicio && $fecha_fin) {
        $strART .= " AND i.fecha BETWEEN '$fecha_inicio' AND '$fecha_fin'";
    }
    // Eliminamos de la session el dato de la grafica por limpieza, y añadimos nuevo valor para la consulta
    unset($_SESSION['datoGrafica']);
    $_SESSION['datoGrafica'] = $strART .= " GROUP BY u.nombre, DATE_FORMAT(i.fecha, '%Y-%m') ORDER BY fecha";   
    // Declaramos el Array para guardar datos 
    $valores = array();
}
function graficaAnoGraficas($con, $tipo, $grupo, $fecha_inicio, $fecha_fin){
    $tipo = $_POST['tipo'];  
    $grupo = $_SESSION['grupo'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_fin = $_POST['fecha_fin'];
    $strART = "SELECT u.nombre AS nombre, YEAR(i.fecha) AS fecha, SUM(i.qty) AS total
                FROM usuarios u
                JOIN $tipo i ON u.id = i.usuario
                WHERE u.grupo = '$grupo'";
    // Fechas inicio-final si se marcan en el filtro
    if ($fecha_inicio && $fecha_fin) {
        $strART .= " AND i.fecha BETWEEN '$fecha_inicio' AND '$fecha_fin'";
    }
    // Eliminamos de la session el dato de la grafica por limpieza, y añadimos nuevo valor para la consulta
    unset($_SESSION['datoGrafica']);
    $_SESSION['datoGrafica'] = $strART .= " GROUP BY u.nombre, YEAR(i.fecha) ORDER BY fecha";
    // Declaramos el Array para guardar datos 
    $valores = array();
}
function graficaMesGraficas($con, $tipo, $grupo, $fecha_inicio, $fecha_fin){
    $tipo = $_POST['tipo'];  
    $grupo = $_SESSION['grupo'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_fin = $_POST['fecha_fin'];
    $strART = "SELECT u.nombre AS nombre, ANY_VALUE(MONTHNAME(i.fecha)) AS fecha, SUM(i.qty) AS total
                FROM usuarios u
                JOIN $tipo i ON u.id = i.usuario
                WHERE u.grupo = '$grupo'";
    // Fechas inicio-final si se marcan en el filtro
    if ($fecha_inicio && $fecha_fin) {
        $strART .= " AND i.fecha BETWEEN '$fecha_inicio' AND '$fecha_fin'";
    } 
    // Eliminamos de la session el dato de la grafica por limpieza, y añadimos nuevo valor para la consulta  
    unset($_SESSION['datoGrafica']);             
    $_SESSION['datoGrafica'] = $strART .= " GROUP BY u.nombre, MONTH(i.fecha) ORDER BY fecha";
    // Declaramos el Array para guardar datos 
    $valores = array();     
}
function graficaCompletaGraficas($con, $tipo, $grupo, $fecha_inicio, $fecha_fin, $nombre_usuario, $concepto, $grupo_concepto){
    $grupo = $_SESSION['grupo'];
    $tipo = $_POST['tipo'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_fin = $_POST['fecha_fin'];
    $nombre_usuario = $_POST['usuario'];
    $concepto = $_POST['concepto'];
    $grupo_concepto = $_POST['grupo_concepto'];
    $agrupa_ano = $_POST['agrupa_ano'] ?? "no";
    $agrupa_mes = $_POST['agrupa_mes'] ?? "no";
    $strART = "SELECT u.nombre AS nombre, i.concepto AS concepto, YEAR(x.fecha) AS fecha, SUM(X.qty) as total, nota, d.grupo AS grupo_concepto
                FROM $tipo x
                JOIN usuarios u ON x.usuario = u.id
                JOIN datos$tipo i ON x.concepto = i.id
                INNER JOIN datos$tipo d ON i.concepto = d.concepto
                WHERE u.grupo = '$grupo'";
    // Declaramos el Array para guardar datos
    $valores = [];
    // Comenzamos a comprobar qué se ha seleccionado
        // Concepto
        if ($concepto) {
            $strART .= " AND i.concepto = :concepto";
            $valores[':concepto'] = $concepto;
        }
        // Grupo
        if ($grupo_concepto) {
            $strART .= " AND d.grupo = :grupo_concepto";
            $valores[':grupo_concepto'] = $grupo_concepto;
        }
        // Eliminamos de la session el dato de la grafica por limpieza, y añadimos nuevo valor para la consulta
        unset($_SESSION['datoGrafica']);             
        $_SESSION['datoGrafica'] = $strART .= " GROUP BY u.nombre, concepto, YEAR(x.fecha) ORDER BY fecha";        
        unset($_SESSION['userGrafica']); 
        $_SESSION['userGrafica'] = $_POST['usuario'];
    /*    $tipo = $_POST['tipo'];  
        $grupo = $_SESSION['grupo'];
        $fecha_inicio = $_POST['fecha_inicio'];
        $fecha_fin = $_POST['fecha_fin'];
        $strART = "SELECT u.nombre AS nombre, YEAR(i.fecha) AS fecha, SUM(i.qty) AS total
                    FROM usuarios u
                    JOIN $tipo i ON u.id = i.usuario
                    WHERE u.grupo = '$grupo'";
        // Fechas inicio-final si se marcan en el filtro
        if ($fecha_inicio && $fecha_fin) {
            $strART .= " AND i.fecha BETWEEN '$fecha_inicio' AND '$fecha_fin'";
        }
        unset($_SESSION['datoGrafica']);
        $_SESSION['datoGrafica'] = $strART .= " GROUP BY u.nombre, YEAR(i.fecha) ORDER BY i.fecha";
        // Declaramos el Array para guardar datos 
        $valores = array();*/
}
function menuSuperior($rol){
    if ($_SESSION['rol'] == 2 || $_SESSION['rol'] == 1) {
        echo '<ul>
                <a href="principal.php"><li class="espacio">INICIO</li></a>
                <a href="principal.php?id=ingresos"> <li>INGRESOS</li></a>
                <a href="principal.php?id=gastos"> <li>GASTOS</li></a>
                <a href="principal.php?id=compras"> <li>COMPRAS</li></a>
                <a href="principal.php?id=graficas"> <li>GRAFICAS</li></a>
                <a href="principal.php?id=datos"> <li>DATOS</li></a>
                <a href="controllers/logout.php"> <li class="espacio">SALIR</li></a>
            </ul>';
    }else if ($_SESSION['rol'] == 3){
        echo '<ul>
                <a href="principal.php?editor"><li class="espacio">INICIO</li></a>
                <a href="principal.php?id=ingresos"> <li>INGRESOS</li></a>
                <a href="principal.php?id=gastos"> <li>GASTOS</li></a>
                <a href="principal.php?id=compras"> <li>COMPRAS</li></a>
                <a href="principal.php?id=muestragraficas"> <li>GRAFICAS</li></a>
                <a href="principal.php?id=muestradatos"> <li>DATOS</li></a>
                <a href="controllers/logout.php"> <li class="espacio">SALIR</li></a>
            </ul>';
    }else{
        echo '<ul>
                <a href="principal.php?id=lector"><li class="espacio">INICIO</li></a>
                <a href="principal.php?id=muestraingresos"> <li>INGRESOS</li></a>
                <a href="principal.php?id=muestragastos"> <li>GASTOS</li></a>
                <a href="principal.php?id=muestracompras"> <li>COMPRAS</li></a>
                <a href="principal.php?id=muestragraficas"> <li>GRAFICAS</li></a>
                <a href="principal.php?id=muestradatos"> <li>DATOS</li></a>
                <a href="controllers/logout.php"> <li class="espacio">SALIR</li></a>
            </ul>';
    }
}

function insercionDatos($id){
    echo '  <ul class="honeycomb">
                <!-- Figura 1 [INICIO]-->
                <li class="honeycomb-cell">
                <!-- >>>>>>>>>> ENLACE <<<<<<<<<< -->    
                    <a href="principal.php?id=ingresos">                    
                        <img class="honeycomb-cell_image" src="img/ingresos.png">
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
                    <a href="principal.php?id=gastos">
                        <img class="honeycomb-cell_image" src="img/gastos.png">
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
                    <a href="principal.php?id=compras">                    
                        <img class="honeycomb-cell_image" src="img/compras.png">
                        <div class="honeycomb-cell_title">  
                <!-- ********** TEXTO DE HEXÁGONO ********** -->
                            COMPRAS
                        </div>
                    </a>
                </li>
                <!-- Figura 3 [FIN]-->
            </ul> ';
}
function gestionDatos($id){
    echo '  <ul class="honeycomb">
                <!-- Figura 4 [INICIO]-->
                <li class="honeycomb-cell">
                <!-- >>>>>>>>>> ENLACE <<<<<<<<<< -->   
                    <a href="principal.php?id=graficas">
                        <img class="honeycomb-cell_image" src="img/graficas.png">
                        <div class="honeycomb-cell_title">
                <!-- ********** TEXTO DE HEXÁGONO ********** -->
                            GRAFICAS
                        </div>
                    </a>    
                </li>
                <!-- Figura 4 [FIN]-->    
                <!-- Figura 5 [INICIO]-->
                <li class="honeycomb-cell">
                <!-- >>>>>>>>>> ENLACE <<<<<<<<<< -->   
                    <a href="principal.php?id=datos">
                        <img class="honeycomb-cell_image" src="img/datos.png">
                        <div class="honeycomb-cell_title">
                <!-- ********** TEXTO DE HEXÁGONO ********** -->
                            DATOS
                        </div>
                    </a> 
                </li>
                <!-- Figura 5 [FIN]-->
            </ul> ';
}

function insercionMuestra($id){
    echo '  <ul class="honeycomb">
                <!-- Figura 1 [INICIO]-->
                <li class="honeycomb-cell">
                <!-- >>>>>>>>>> ENLACE <<<<<<<<<< -->    
                    <a href="principal.php?id=muestraingresos">                    
                        <img class="honeycomb-cell_image" src="img/ingresos.png">
                        <div class="honeycomb-cell_title">   
                <!-- ********** TEXTO DE HEXÁGONO ********** -->
                            GASTOS
                        </div>
                    </a>       
                </li>
                <!-- Figura 1 [FIN]-->    
                <!-- Figura 2 [INICIO]-->
                <li class="honeycomb-cell">
                <!-- >>>>>>>>>> ENLACE <<<<<<<<<< -->    
                    <a href="principal.php?id=muestragastos">
                        <img class="honeycomb-cell_image" src="img/gastos.png">
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
                    <a href="principal.php?id=muestracompras">                    
                        <img class="honeycomb-cell_image" src="img/compras.png">
                        <div class="honeycomb-cell_title">  
                <!-- ********** TEXTO DE HEXÁGONO ********** -->
                            COMPRAS
                        </div>
                    </a>
                </li>
                <!-- Figura 3 [FIN]-->
            </ul> ';
}
function gestionMuestra($id){
    echo '  <p class="caja__textos"> Aunque no puedes ver información a tiempo real, te mostramos un ejemplo de lo que verías en esta sección </p>
            <ul class="honeycomb">
                <!-- Figura 4 [INICIO]-->
                <li class="honeycomb-cell">
                <!-- >>>>>>>>>> ENLACE <<<<<<<<<< -->   
                    <a href="principal.php?id=muestragraficas">
                        <img class="honeycomb-cell_image" src="img/graficas.png">
                        <div class="honeycomb-cell_title">
                <!-- ********** TEXTO DE HEXÁGONO ********** -->
                            GRAFICAS
                        </div>
                    </a>    
                </li>
                <!-- Figura 4 [FIN]-->    
                <!-- Figura 5 [INICIO]-->
                <li class="honeycomb-cell">
                <!-- >>>>>>>>>> ENLACE <<<<<<<<<< -->   
                    <a href="principal.php?id=muestradatos">
                        <img class="honeycomb-cell_image" src="img/datos.png">
                        <div class="honeycomb-cell_title">
                <!-- ********** TEXTO DE HEXÁGONO ********** -->
                            DATOS
                        </div>
                    </a> 
                </li>
                <!-- Figura 5 [FIN]-->
            </ul> ';
}

function paginaFallo(){
    echo '  <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>·:.:· ConrEcugA ·:.:· Control de gastos-recursos-cuentas-ganancias</title>
                <link rel="stylesheet" href="../sass/main.css">
                <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
            </head>
            <body>
                <div class="global">
                    <!-- CABECERA -->
                    <div class="cabecera">
                        <div class="cabecera__logo">
                            <img src="../img/logo.png" alt="logo">
                        </div>
                    </div>
                    <div class="caja" id="mensaje">
                        <div class="caja__titulo">
                            <p>Algo ha ido mal</p>
                        </div>
                        <div class="caja__textos">
                            <p>No tiene permiso para acceder a esta página, Será redirigid@</p>
                        </div>
                    </div>
                </div>
            </body>
            </html>';
}
function cabezaVolver(){
    echo '  <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>·:.:· ConrEcugA ·:.:· Control de gastos-recursos-cuentas-ganancias</title>
                <link rel="stylesheet" href="../sass/main.css">
                <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
            </head>
            <body>
                <div class="global">
                    <!-- CABECERA -->
                    <div class="cabecera">
                        <div class="cabecera__logo">
                            <img src="../img/logo.png" alt="logo">
                        </div>
                    </div>';
}
function pieVolver(){
    echo'   <div class="caja__honeycomb">
                <ul class="honeycomb">
                    <!-- EL RETONNO [INICIO] -->
                    <li class="honeycomb-cell">
                    <!-- >>>>>>>>>> ENLACE <<<<<<<<<< -->   
                        <a href="../index.html">
                            <img class="honeycomb-cell_image" src="../img/back.png">
                            <div class="honeycomb-cell_title">
                    <!-- ********** TEXTO DE HEXÁGONO ********** -->
                                VOLVER
                            </div>
                        </a> 
                    </li>
                    <!-- EL RETONNO [FIN] -->
                </ul>
            </div>   
            <div class="pie">
                <p class="pie__datos">&#169; ConrEcugA - Luis Peñalver - PFC Desarollo de Aplicaciones Web - 2023</p>
            </div>';                
}
?>
