<!-- Conexiones -->
<?php 
	include_once("controllers/ctrl_acceso.php");
	include_once("config/conectar_db.php");
	include_once("controllers/funciones.php");
?>
<!-- CABECERA -->
<?php include("views/cabecera.php");?>
<!-- CENTRAL -->
<?php include_once("controllers/controlador.php");?>
<!-- PIE -->
<?php include("views/pie.php");?>