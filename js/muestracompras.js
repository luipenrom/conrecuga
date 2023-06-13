//Establezco las variables para COMPRAS
var supermercado = document.getElementById("supermercado");
var hipermercado = document.getElementById("hipermercado");
var brico = document.getElementById("brico");
var comida = document.getElementById("comida");
var electronica = document.getElementById("electronica");
var trabajo = document.getElementById("trabajo");
var juguetes = document.getElementById("juguetes");
var gasolina = document.getElementById("gasolina");
var viajes = document.getElementById("viajes");
var viajes = document.getElementById("otros");
//Agrego evento click a cada elemento <li>
supermercado.addEventListener("click", function() {window.location.href = "principal.php?id=muestrasupermercado";});
hipermercado.addEventListener("click", function() {window.location.href = "principal.php?id=muestrahipermercado";});
brico.addEventListener("click", function() {window.location.href = "principal.php?id=muestrabrico";});
comida.addEventListener("click", function() {window.location.href = "principal.php?id=muestracomida";});
electronica.addEventListener("click", function() {window.location.href = "principal.php?id=muestraelectronica";});
viajes.addEventListener("click", function() {window.location.href = "principal.php?id=muestraviajes";});
trabajo.addEventListener("click", function() {window.location.href = "principal.php?id=muestratrabajo";});
juguetes.addEventListener("click", function() {window.location.href = "principal.php?id=muestrajuguetes";});
gasolina.addEventListener("click", function() {window.location.href = "principal.php?id=muestragasolina";});
viajes.addEventListener("click", function() {window.location.href = "principal.php?id=muestraviajes";});
viajes.addEventListener("click", function() {window.location.href = "principal.php?id=muestraotros";});