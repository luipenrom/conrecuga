
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>·:.:· ConrEcugA - Insercion de compra ·:.:·</title>
    <link rel="stylesheet" href="../sass/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
<?php
    error_reporting(0);
    session_start();
    include("../config/conectar_db.php");
        $concepto = $_POST['concepto'];
        $usuario = $_SESSION['id'];
        $fecha = $_POST['fecha'];
        $qty = $_POST['cantidad'];
        $nota = $_POST['nota'];
        $img = $_POST['imagen'];
        /* POR SI PONEMOS YA LA IMAGEN DEL TICKET
        $imagen = $_FILES['imagen'];
        $nombre_archivo = $imagen['name'];
        $ruta = "images/" . $nombre_archivo;
        $temp = $imagen['tmp_name'];
            //verificamos el formato de la imagen      
            $allowed = array('jpg', 'jpeg', 'gif', 'png');
            $ext = pathinfo($nombre_archivo, PATHINFO_EXTENSION);
            $imagenres = GetImageSize($temp);
            $imagensize = $_FILES['imagen']['size'];
            $tipo_imagen = $_FILES["imagen"]["type"];
                if (!in_array($ext, $allowed)) {
                    echo 'El formato del archivo no es correcto. Por favor, introdúzcalo en formato: jpg, jpeg, gif o png' . "<br><br>";
                    echo '<a href="ARTICULOS_FORM_editar.php"><button class="volver">Volver</button></a></h4>';
                    die; 
                }
                if($imagensize > 300000 ){
                    echo 'El tamaño del archivo no es correcto. Debe tener un peso máximo de 300KB' . "<br><br>";
                    echo '<a href="ARTICULOS_FORM_editar.php"><button class="volver">Volver</button></a></h4>';
                    die; 
                }
                if($imagenres[0] > 200 && $imagenres[1] >200){
                    echo 'El tamaño del archivo no es correcto. Debe tener una resolucion máxima de 200 x 200 píxeles' . "<br><br>";
                    echo '<a href="ARTICULOS_FORM_editar.php"><button class="volver">Volver</button></a></h4>';
                    die; 
                }
                if (move_uploaded_file($temp,$ruta)) {};  
            */
                //se acaba lo nuevo

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
                 //Tienda
                 if( empty($_POST['concepto']) )
                  $aErrores[] = "Hay que introducir una tienda";
                 else{ $aMensajes[] = "El nº de tienda es: [".$concepto."]"; }   
                 // Nombre:
                 if( empty($_POST['cantidad']) )
                 $aErrores[] = "Debe especificar cuánto cuesta la compra";
                 else{ $aMensajes[] = "Ha costado: [".$qty."]"; }
                 //Observaciones
                 if( empty($_POST['nota']) )
                 $aErrores[] = "Puedes poner una observación";
                 else{ $aMensajes[] = "Observaciones: [".$nota."]"; }
                 //Usuario
                 if( empty($_SESSION['nombre']) )
                 $aErrores[] = "No hay usuario";
                 else{ $aMensajes[] = "El nº de usuario es: [".$usuario."]"; }             
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
                        $stmt = $con->prepare("INSERT INTO compras (usuario, concepto, fecha, qty, nota, img) VALUES (:usuario, :concepto, :fecha, :qty, :nota, :img)");
                    // Bind y execute:
                    if($stmt->execute(array(':usuario'=>$usuario, ':concepto'=>$concepto, ':fecha'=>$fecha, ':qty'=>$qty, ':nota'=>$nota, ':img'=>$img))) {
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
                    <a href="../principal.php?id=compras">
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
