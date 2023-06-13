<?php 
	session_start();
	include_once("../config/conectar_db.php");
    $userlog= $_POST['user'];
    $passlog = $_POST['pass'];
	$_SESSION['nombre'] = $_POST['user'];
	$contador = 0;
	$pass_enc = password_hash($passlog, PASSWORD_DEFAULT);
	$stmt = $con->prepare("SELECT * FROM usuarios WHERE nombre = :user;");
	$stmt->execute(array(":user"=>$userlog));
	while($datos = $stmt->fetch(PDO::FETCH_ASSOC)){
		//verifico la contraseña introducida con la almacenada
		if(password_verify($passlog, $datos['pass'])){
			$contador++;
			$rollog = $_SESSION['rol'] = $datos['rol'];
			$dnilog = $_SESSION['id'] = $datos['id'];
			$_SESSION['nombre'] = $datos['nombre'];
			$_SESSION['grupo'] = $datos['grupo'];
			}
	}
	//En caso de no encontrar los datos, vamos a la págiona de error.
	if ($contador>0) {
		if ($rollog == '4'){
			header("Location: ../principal.php?id=lector");}
		else if ($rollog == '3'){
			header("Location: ../principal.php?id=editor");} 	
		else if ($rollog == '2'){
			header("Location: ../principal.php");}	
		else{
			header("Location: ../principal.php");
		}
	}else {
		header('Location: ../views/mal.html');
	}	
?>



