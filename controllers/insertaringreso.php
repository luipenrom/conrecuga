
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>·:.:· ConrEcugA - Insercion de ingreso ·:.:·</title>
    <link rel="stylesheet" href="../sass/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
<?php
    error_reporting(0);
    session_start();
    include("../config/conectar_db.php");
        $usuario = $_SESSION['id'];
        $concepto = $_POST['concepto'];
        $fecha = $_POST['fecha'];
        $qty = $_POST['cantidad'];
        $neto = $_POST['neto']; 
        $irpf = $_POST['irpf'];
        $nota = $_POST['nota'];
     // Arrays para guardar mensajes y errores:
     $aErrores = array();
     $aMensajes = array();
         // Comprobar si se ha enviado el formulario:
         if( !empty($_POST) ){
             // Comprobar si llegaron los campos requeridos:
             if( isset($_POST['fecha']) && isset($_POST['cantidad'])){
                 // Fecha:
                 if( empty($_POST['fecha']) )
                 $aErrores[] = "Debe especificar una fecha";
                 else{ $aMensajes[] = "La fecha es: [".$fecha."]";}
                 // Nombre:
                 if( empty($_POST['cantidad']) )
                 $aErrores[] = "Debe especificar de cuánto es el ingreso";
                 else{ $aMensajes[] = "Ha costado: [".$qty."]"; }
                 //Observaciones
                 if( empty($_POST['nota']) )
                 $aErrores[] = "Es conveniente poner una observación";
                 else{ $aMensajes[] = "Observaciones: [".$nota."]"; }
                 //Usuario
                 if( empty($_SESSION['nombre']) )
                 $aErrores[] = "No hay usuario";
                 else{ $aMensajes[] = "El nº de usuario es:: [".$usuario."]"; }     
            }
             else{
                 echo "<p>No se han especificado todos los datos requeridos.</p>";
             }
             // Mostramos errores o mensajes
            if( count($aErrores) > 0 ){
                print_r($_SESSION); 
                echo "<h2>ERRORES ENCONTRADOS:</h2>";
                 // Mostrar los errores:
                 for( $contador=0; $contador < count($aErrores); $contador++ )
                     echo $aErrores[$contador]."<br/>";
                 }
                 else{
                     try {
                        $stmt = $con->prepare("INSERT INTO ingresos (usuario, concepto, fecha, qty, neto, irpf, nota) VALUES (:usuario, :concepto, :fecha, :qty, NULLIF(:neto,''), NULLIF(:irpf,''), :nota)");
                    // Bind y execute:
                        if($stmt->execute(array(':usuario'=>$usuario, ':concepto'=>$concepto, ':fecha'=>$fecha, ':qty'=>$qty, ':neto'=>$neto, ':irpf'=>$irpf, ':nota'=>$nota))) {
                echo '<h2>Esta insertado, se ha insertado, lo hemos logrado, y todo ha mejorado, está insertado</h2>';
                print_r($aMensajes);}
            } catch (PDOException $e){
                echo 'Algo no ha ido bien, lo siento.'.$e->getMessage();
                print_r($aMensajes);

        }
    }}  
    ?>
    <div class="caja__honeycomb">
        <ul class="honeycomb">
            <!-- EL RETONNO [INICIO] -->
            <li class="honeycomb-cell">
            <!-- >>>>>>>>>> ENLACE <<<<<<<<<< -->   
                <a href="../principal.php?id=ingresos">
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
                <p class="pie__datos">&#169 ConrEcugA - Luis Peñalver - PFC Desarollo de Aplicaciones Web - 2023</p>
        </div>
</body>
</html>
