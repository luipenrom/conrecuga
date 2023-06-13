<!-- CENTRAL -->
<div class="contenedor">    
    <div class="caja">
        <div class="caja__titulo">
            <p class="caja__titulo-cabeza">Aqui tienes una muestra de Grafica</p>
        </div>
        <div class="caja__textos">
        <div id="myDiv" style="width: 100%; height: 100%;"></div>
    <script>
        // Obtenemos los datos de la consulta
        var fechas = [2012,2013,2014,2015,2016,2017];
        var valoresV = ["1550.00"];
        var valoresL = ["2645.65","2000.00","11179.06","11768.68","14700.00","5736.89"];
        var valoresC = ["1500.00","3566.32","2119.23","19084.70","3321.38"];

        // Crear trazas para cada nombre
        var traceV = {
            x: fechas,
            y: valoresV,
            name: 'Vicky',
            type: 'bar'
        };

        var traceL = {
            x: fechas,
            y: valoresL,
            name: 'Luis',
            type: 'bar'
        };

        var traceC = {
            x: fechas,
            y: valoresC,
            name: 'Conjunto',
            type: 'bar'
        };

        var data = [traceV, traceL, traceC];

        // Configuración del gráfico
        var layout = {
            title: 'Gráfico de barras agrupado',
            xaxis: {
                title: 'Fechas'
            },
            yaxis: {
                title: 'Total'
            },
            barmode: 'group'
        };

        // Crear el gráfico
        Plotly.newPlot('myDiv', data, layout);
    </script>

        </div>
    </div> 
</div>