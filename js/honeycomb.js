const selPanal = document.querySelectorAll('.honeycomb-cell');
selPanal.forEach(cell => {
    cell.addEventListener('click', () => {
    //identifico la id del elemento seleccionado:
    let idSeleccion = cell.id;
    // Ocultar todos los elementos li excepto el que se ha hecho clic
    selPanal.forEach(otherCell => {
    if (otherCell !== cell) {
    otherCell.style.display = 'none';
    // Introduzco en el value del input correspondiente el nombre de la tienda seleccionada
    } else { 
        document.getElementById("nombre").value = idSeleccion;
    }
    });
        // Mostrar el formulario correspondiente
        const form = document.getElementById('metedatos');
        form.style.display = 'block';
   });
  });