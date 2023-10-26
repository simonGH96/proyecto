<?php
// Incluye el encabezado
require 'header.php';
?>
<!DOCTYPE html>
<html>
<head>
    <!-- Enlaza a la biblioteca Highcharts desde un CDN -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
</head>
<body>
    <!-- Elemento contenedor para el gráfico -->
    <div id="container" style="width: 600px; height: 400px;"></div>

    <script>
        // Datos de ejemplo (puedes reemplazar esto con tus propios datos)
        var dataFromDatabase = {
            categories: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo'],
            values: [10, 20, 15, 25, 30]
        };

        // Configura las opciones del gráfico
        var options = {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Ejemplo de Gráfico Highcharts'
            },
            xAxis: {
                categories: dataFromDatabase.categories // Categorías del eje X
            },
            yAxis: {
                title: {
                    text: 'Valores'
                }
            },
            series: [{
                name: 'Datos de la BD',
                data: dataFromDatabase.values // Valores para el gráfico
            }]
        };

        // Renderiza el gráfico en el contenedor "container"
        Highcharts.chart('container', options);
    </script>
</body>
</html>
