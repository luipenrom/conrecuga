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
var otros = document.getElementById("otros");
//Agrego evento click a cada elemento <li>
supermercado.addEventListener("click", function() {
  window.location.href = "principal.php?id=supermercado";
});
hipermercado.addEventListener("click", function() {
  window.location.href = "principal.php?id=hipermercado";
});
brico.addEventListener("click", function() {
  window.location.href = "principal.php?id=brico";
});
comida.addEventListener("click", function() {
  window.location.href = "principal.php?id=comida";
});
electronica.addEventListener("click", function() {
  window.location.href = "principal.php?id=electronica";
});
viajes.addEventListener("click", function() {
  window.location.href = "principal.php?id=viajes";
});
trabajo.addEventListener("click", function() {
  window.location.href = "principal.php?id=trabajo";
});
juguetes.addEventListener("click", function() {
  window.location.href = "principal.php?id=juguetes";
});
gasolina.addEventListener("click", function() {
  window.location.href = "principal.php?id=gasolina";
});
viajes.addEventListener("click", function() {
  window.location.href = "principal.php?id=viajes";
});
otros.addEventListener("click", function() {
  window.location.href = "principal.php?id=otros";
});