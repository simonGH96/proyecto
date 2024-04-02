<?php
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

<!-- Gráficos -->
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
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/cylinder.js"></script>
<script src="https://code.highcharts.com/modules/funnel3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://code.highcharts.com/modules/treemap.js"></script>

<body>
    <script>
    Highcharts.chart('Grafica1', {
    chart: {
        type: 'pie'
    },
    title: {
        text: 'Egg Yolk Composition'
    },
    tooltip: {
        valueSuffix: '%'
    },
    subtitle: {
        text:
        'Source:<a href="https://www.mdpi.com/2072-6643/11/3/684/htm" target="_default">MDPI</a>'
    },
    plotOptions: {
        series: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: [{
                enabled: true,
                distance: 20
            }, {
                enabled: true,
                distance: -40,
                format: '{point.percentage:.1f}%',
                style: {
                    fontSize: '1.2em',
                    textOutline: 'none',
                    opacity: 0.7
                },
                filter: {
                    operator: '>',
                    property: 'percentage',
                    value: 10
                }
            }]
        }
    },
    series: [
        {
            name: 'Percentage',
            colorByPoint: true,
            data: [
                {
                    name: 'Water',
                    y: 55.02
                },
                {
                    name: 'Fat',
                    sliced: true,
                    selected: true,
                    y: 26.71
                },
                {
                    name: 'Carbohydrates',
                    y: 1.09
                },
                {
                    name: 'Protein',
                    y: 15.5
                },
                {
                    name: 'Ash',
                    y: 1.68
                }
            ]
        }
    ]
});

</script>

<script >
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
            }, {
                name: 'Datos 2',
                data: [5, 6, 13, 24, 5]
            }]
        };

        // Renderiza el gráfico en el contenedor "container"
        Highcharts.chart('Grafica2', options);
    </script>


<script>
        // Set up the chart
    Highcharts.chart('container', {
        chart: {
            type: 'funnel3d',
            options3d: {
                enabled: true,
                alpha: 10,
                depth: 50,
                viewDistance: 50
            }
        },
        title: {
            text: 'Asignaturas por componente'
        },
        accessibility: {
            screenReaderSection: {
                beforeChartFormat: '<{headingTagName}>{chartTitle}</{headingTagName}><div>{typeDescription}</div><div>{chartSubtitle}</div><div>{chartLongdesc}</div>'
            }
        },
        plotOptions: {
            series: {
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b> ({point.y:,.0f})',
                    allowOverlap: true,
                    y: 10
                },
                neckWidth: '30%',
                neckHeight: '25%',
                width: '80%',
                height: '80%'
            }
        },
        series: [{
            name: 'Asignaturas',
            data: [
                
                {
                    name: 'Water',
                    y: 55.02
                },
                {
                    name: 'Fat',
                    sliced: true,
                    selected: true,
                    y: 26.71
                },
                {
                    name: 'Carbohydrates',
                    y: 1.09
                },
                {
                    name: 'Protein',
                    y: 15.5
                },
                {
                    name: 'Ash',
                    y: 1.68
                }
            ]
        }]
    });
</script>
<script>
        // Data retrieved from https://gs.statcounter.com/browser-market-share#monthly-202201-202201-bar
    // Create the chart
    Highcharts.chart('Grafica3', {
        chart: {
            type: 'column'
        },
        title: {
            align: 'left',
            text: 'Resultados de aprendizaje asignados, distribuidos en componentes y asignaturas'
        },
        accessibility: {
            announceNewData: {
                enabled: true
            }
        },
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: 'Total resultados de aprendizaje'
            }

        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y}'
                }
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b> of total<br/>'
        },

        series: [
            {
                name: "Resultados de aprendizaje",
                colorByPoint: true,
                data: [
                    
                ]
            }
        ],
        drilldown: {
            breadcrumbs: {
                position: {
                    align: 'right'
                }
            },
            series: [
                {
                    name: 'Water',
                    y: 55.02
                },
                {
                    name: 'Fat',
                    sliced: true,
                    selected: true,
                    y: 26.71
                }
            ]
        }
    });
</script>
</body>

</html>