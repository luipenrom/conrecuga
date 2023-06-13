  // Obtén los elementos por sus ID
  const agrupaAnoCheckbox = document.getElementById('agrupa_ano');
  const agrupaMesCheckbox = document.getElementById('agrupa_mes');
  const disableableElements = document.getElementsByClassName('disableable');

  // Función para manejar el cambio de estado de los elementos
  function handleCheckboxChange() {
    const shouldDisable = agrupaAnoCheckbox.checked || agrupaMesCheckbox.checked;

    for (let i = 0; i < disableableElements.length; i++) {
      disableableElements[i].disabled = shouldDisable;
    }
  }

  // Agrega eventos de escucha a los checkboxes
  agrupaAnoCheckbox.addEventListener('change', handleCheckboxChange);
  agrupaMesCheckbox.addEventListener('change', handleCheckboxChange);