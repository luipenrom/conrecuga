//Establezco las variables para INGRESOS
var regular = document.getElementById("regular");
var puntual = document.getElementById("puntual");
var extra = document.getElementById("extra");
//Agrego evento click a cada elemento <li>
regular.addEventListener("click", function() {
  window.location.href = "principal.php?id=regular";
});
puntual.addEventListener("click", function() {
  window.location.href = "principal.php?id=puntual";
});
extra.addEventListener("click", function() {
  window.location.href = "principal.php?id=extra";
});