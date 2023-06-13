//Establezco las variables para GASTOS
var hipoteca = document.getElementById("hipoteca");
var agua = document.getElementById("agua");
var casa = document.getElementById("casa");
var luz = document.getElementById("luz");
var telefonia = document.getElementById("telefonia");
var seguros = document.getElementById("seguros");
var colegio = document.getElementById("colegio");
var coches = document.getElementById("coches");
var trabajo = document.getElementById("trabajo");
var entretenimiento = document.getElementById("entretenimiento");
var otros = document.getElementById("otros");

//Agrego evento click a cada elemento <li>
hipoteca.addEventListener("click", function() {window.location.href = "principal.php?id=muestrahipoteca";});
agua.addEventListener("click", function() {window.location.href = "principal.php?id=muestraagua";});
casa.addEventListener("click", function() {window.location.href = "principal.php?id=muestracasa";});
luz.addEventListener("click", function() {window.location.href = "principal.php?id=muestraluz";});
telefonia.addEventListener("click", function() {window.location.href = "principal.php?id=muestratelefonia";});
seguros.addEventListener("click", function() {window.location.href = "principal.php?id=muestraseguros";});
colegio.addEventListener("click", function() {window.location.href = "principal.php?id=muestracolegio";});
coches.addEventListener("click", function() {window.location.href = "principal.php?id=muestracoches";});
trabajo.addEventListener("click", function() {window.location.href = "principal.php?id=muestratrabajo";});
entretenimiento.addEventListener("click", function() {window.location.href = "principal.php?id=muestraentretenimiento";});
otros.addEventListener("click", function() {window.location.href = "principal.php?id=muestraotros";});