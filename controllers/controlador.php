<?php
if (isset($_REQUEST['id'])) {$id = $_REQUEST['id'];}
else ($id= 0);
if ($id == '0'){ include('views/indice.php');}
else if ($id == 'ingresos'){ include('views/inicial_insercion.php');} 	
else if ($id == 'gastos'){ include('views/inicial_insercion.php');} 	
else if ($id == 'compras'){ include('views/inicial_insercion.php');} 	
else if ($id == 'graficas'){ include('views/inicial_gestion.php');} 	
else if ($id == 'datos'){ include('views/inicial_gestion.php');} 	
//----- páginas para ingresos -----
else if ($id == 'regular' || $id == 'puntual' 
        || $id == 'extra')
        { include('views/ingresos.php');}
//----- páginas para gastos -----
else if ($id == 'hipoteca' || $id == 'agua' || $id == 'casa' 
        || $id == 'luz' || $id == 'telefonia' || $id == 'seguros' 
        || $id == 'colegio' || $id == 'coches' || $id == 'trabajo' 
        || $id == 'entretenimiento' || $id == 'otros')
        { include('views/gastos.php');}
//----- páginas para compras -----
else if ($id == 'supermercado' || $id == 'hipermercado' || $id == 'brico' 
        || $id == 'comida' || $id == 'electronica' || $id== 'electronica ' 
        || $id == 'juguetes' || $id == 'gasolina' || $id == 'viajes')
        { include('views/compras.php');}
//----- páginas para graficas ----- 
else if ($id == 'graficasingresos'){ include('views/filtro_graficas.php');} 	
else if ($id == 'graficasgastos'){ include('views/filtro_graficas.php');} 	
else if ($id == 'graficascompras'){ include('views/filtro_graficas.php');}  
else if ($id == 'graficasbuscar'){ include('controllers/buscargraficas.php');} 
//----- páginas para datos -----       
else if ($id == 'datosingresos'){ include('views/filtro_datos.php');} 	
else if ($id == 'datosgastos'){ include('views/filtro_datos.php');} 	
else if ($id == 'datoscompras'){ include('views/filtro_datos.php');}  
else if ($id == 'datosbuscar'){ include('controllers/buscardatos.php');}  
//----- páginas para roles -----       
else if ($id == 'editor'){ include('views/indice.php');} 	
else if ($id == 'lector'){ include('views/indice.php');}
else if ($id == 'muestraingresos'){ include('views/muestra_insercion.php');}
else if ($id == 'muestragastos'){ include('views/muestra_insercion.php');}
else if ($id == 'muestracompras'){ include('views/muestra_insercion.php');}
else if ($id == 'muestragraficas'){ include('views/muestra_graficas.php');}
else if ($id == 'muestradatos'){ include('views/muestra_datos.php');}
        //----- páginas para ingresos -----
        else if ($id == 'muestraregular' || $id == 'muestrapuntual' 
                || $id == 'muestraextra')
                { include('views/muestra_ingresos.php');}
        //----- páginas para gastos -----
        else if ($id == 'muestrahipoteca' || $id == 'muestraagua' || $id == 'muestracasa' 
                || $id == 'muestraluz' || $id == 'muestratelefonia' || $id == 'muestraseguros' 
                || $id == 'muestracolegio' || $id == 'muestracoches' || $id == 'muestratrabajo' 
                || $id == 'muestraentretenimiento' || $id == 'muestraotros')
                { include('views/muestra_gastos.php');}
        //----- páginas para compras -----
        else if ($id == 'muestrasupermercado' || $id == 'muestrahipermercado' || $id == 'muestrabrico' 
                || $id == 'muestracomida' || $id == 'muestraelectronica' || $id== 'electronica ' 
                || $id == 'muestrajuguetes' || $id == 'muestragasolina' || $id == 'muestraviajes')
                { include('views/muestra_compras.php');}
//---- Por si acaso, retorno al inicial -------
else ('views/indice.php');
?>





