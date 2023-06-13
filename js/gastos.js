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
hipoteca.addEventListener("click", function() {window.location.href = "principal.php?id=hipoteca";});
agua.addEventListener("click", function() {window.location.href = "principal.php?id=agua";});
casa.addEventListener("click", function() {window.location.href = "principal.php?id=casa";});
luz.addEventListener("click", function() {window.location.href = "principal.php?id=luz";});
telefonia.addEventListener("click", function() {window.location.href = "principal.php?id=telefonia";});
seguros.addEventListener("click", function() {window.location.href = "principal.php?id=seguros";});
colegio.addEventListener("click", function() {window.location.href = "principal.php?id=colegio";});
coches.addEventListener("click", function() {window.location.href = "principal.php?id=coches";});
trabajo.addEventListener("click", function() {window.location.href = "principal.php?id=trabajo";});
entretenimiento.addEventListener("click", function() {window.location.href = "principal.php?id=entretenimiento";});
otros.addEventListener("click", function() {window.location.href = "principal.php?id=otros";});