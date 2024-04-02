<?php
// Incluye el encabezado
require 'header.php';
require '../Controllers/pruebacontrolador.php';

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<div class="row justify-content-center" id="general-title">
        <div class="col-11">
            
            <h3>Tratamiento estadístico</h3>
        </div>
    </div>
<!-- Cuadritos informativos -->
<div class="row justify-content-center" id="widgets-sts">
        <div class="col-11">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-secondary shadow">
                        <div class="inner">
                            <h3><?php echo $cantidadEstudiantes; ?></h3>
                            <p class="white-text">Estudiantes activos</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-solid fa-graduation-cap fa-3x"></i>
                        </div>
                    </div>
                </div>

               
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success shadow">
                        <div class="inner">
                            <h3>77</h3>
                            <p class="white-text">Espacios académicos</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-solid fa-arrow-circle-o-up fa-3x"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger shadow">
                        <div class="inner">
                            <h3><?php echo $cantidadDocentes; ?></h3>
                            <p class="white-text">Docentes</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-solid fa-male fa-3x"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning shadow">
                        <div class="inner">
                            <h3>90</h3>
                            <p>Planes de trabajo</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-solid fa-book fa-3x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-11">
            <div class="row" id="charts">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <div id="Grafica1"></div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                    <div class="card-body">
                            <div id="container"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" id="charts">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div id="Grafica2"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" id="charts">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div id="Grafica3"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Enlaza a la biblioteca Highcharts desde un CDN -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
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