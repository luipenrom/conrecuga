<?php 
	session_start();
	//error_reporting(0);
    //include_once("../config/conectar_db.php");
	if (empty($_SESSION['nombre']) || empty($_SESSION['grupo'])) {
		echo '<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta charset="UTF-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>·:.:· ConrEcugA ·:.:· Control de gastos-recursos-cuentas-ganancias</title>
			<link rel="stylesheet" href="sass/main.css">
			   <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
		</head>
		<body>
			<div class="global">
				<!-- CABECERA -->
				<div class="cabecera">
					<div class="cabecera__logo">
						<img src="img/logo.png" alt="logo">
					</div>
				</div>
				<div class="caja" id="mensaje">
					<div class="caja__titulo">
						<p>Algo ha ido mal</p>
					</div>
					<div class="caja__textos">
						<p>No tiene permiso para acceder a esta página, Será redirigid@</p>
					</div>
				</div>';   
		header('refresh:5;url=index.html');
		exit();		
	}
?>