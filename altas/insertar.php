      
<?php
include_once("../controllers/funciones.php");
if (empty($_GET['id'])) {
    paginaFallo();  
    header('refresh:5;url=../index.html');
    exit();	
} 
session_start();
    include_once("../config/conectar_db.php");
    $grupo = $_POST['grupo'];
    $nombre = $_POST['nombre'];
    $clave = $_POST['pass'];
    $pass_enc = password_hash($clave, PASSWORD_DEFAULT);
    $rol =  $_REQUEST["rol"];
    $activo =  $_REQUEST["activo"];

        // Arrays para guardar mensajes y errores:
        $aErrores = array();
        $aMensajes = array();
            // Comprobar si se ha enviado el formulario:
            if( !empty($_POST) ){
                // Comprobar si llegaron los campos requeridos:
                if( isset($_POST['grupo']) && isset($_POST['nombre']) && isset($_POST['pass']) ){
                    // Nombre:
                    if( empty($_POST['grupo']) )
                    $aErrores[] = "Debe especificar su grupo de registro";
                    else{ $aMensajes[] = "grupo: [".$_REQUEST['grupo']."]"; }
                    // Nombre:
                    if( empty($_POST['nombre']) )
                    $aErrores[] = "Debe especificar su nombre";
                    else{ $aMensajes[] = "nombre: [".$_REQUEST['nombre']."]"; }
                    // Clave:
                    if( empty($_POST['pass']) )
                    $aErrores[] = "Debe especificar una contraseña";
                    else{ $aMensajes[] = "contraseña: [".$_REQUEST['pass']."]"; }
                }
                else{
                    echo "<p>No se han especificado todos los datos requeridos.</p>";
                }
                // Mostramos errores o mensajes
               if( count($aErrores) > 0 ){
                    echo "<h2>ERRORES ENCONTRADOS:</h2>";
                    // Mostrar los errores:
                    for( $contador=0; $contador < count($aErrores); $contador++ )
                        echo $aErrores[$contador]."<br/>";
                    }
                    else{
                        try {
                            $stmt = $con->prepare("INSERT INTO usuarios (nombre, grupo, pass, rol, activo) VALUES (:nombre, :grupo, :pass, :rol, :activo)"); 
                            // Bind y execute: 
                            if($stmt->execute(array(':nombre'=>$nombre, ':grupo'=>$grupo, ':pass'=>$pass_enc, ':rol'=>$rol, ':activo'=>$activo))) {
                            cabezaVolver();
                            echo "<h2>¡Registro creado satisfactoriamente!</h2>";
                            pieVolver();}
                        } catch (PDOException $e){
                            cabezaVolver();
                            echo '<h2>Me parece que el nombre de usuario que has elegido, no está disponible. </h2>';
                            echo '<p>Por favor, prueba con otro (puedes añadir algún numero o usar una combinación de letras) </p>';
                            pieVolver();
                    }
                }}
    ?>