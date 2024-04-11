<?php
require 'header.php';
require '../Controllers/pruebacontrolador.php';
require '../Models/data_Students.php'
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
                        <h3><?php echo $cantidadMaterias?></h3>
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
                        <h3><?php echo $cantidadPlanes?></h3>
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
        text: 'Razones de bajo rendimiento'
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
                    name: 'Carrera incorrecta',
                    y: 27.8
                },
                {
                    name: 'Problemas familiares',
                    sliced: true,
                    selected: true,
                    y: 26.1
                },
                {
                    name: 'Adaptación a la univeridad',
                    y: 5.9
                },
                {
                    name: 'Movilidad',
                    y: 26.1
                },
                {
                    name: 'Otro',
                    y: 12.9
                }
            ]
        }
    ]
});

</script>

<script >
        // Datos de ejemplo 
        var dataFromDatabase = {
            categories: <?php echo json_encode($nombres); ?>,
            
            values: [1, 2, 5, 2, 3]
        };

        // Configura las opciones del gráfico
        var options = {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Gráfico Semestres'
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
                name: 'Tiempo en la universidad',
                data: dataFromDatabase.values // Valores para el gráfico
            }, {
                name: 'Tiempo esperado para grado',
                data: [9, 8, 5, 8, 7]
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
            text: 'Consejeria con mayor exito'
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
            name: 'consejo',
            data: [
                
                {
                    name: 'Tutorias',
                    y: 45
                },
                {
                    name: 'Acompañamiento psicológico',
                    sliced: true,
                    selected: true,
                    y: 26.71
                },
                {
                    name: 'Inscripción deportiva',
                    y: 5.7
                },
                {
                    name: 'Subsidio económico',
                    y: 2.8
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
            align: 'center',
            text: 'Historico cantidad de asignaturas habiliatadas por area'
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
                text: 'Total asignaturas habilitadas'
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
                name: "Historico por Area",
                colorByPoint: true,
                data: [
                    {
                    name: 'Componente propedeutico',
                    y: 39,
                    drilldown: 'Componente propedeutico'
                },
                {
                    name: 'Area de ciencias básicas',
                    y: 90,
                    drilldown: 'Area de ciencias básicas'
                },
                {
                    name: 'Area básica de ingeniería',
                    y: 25,
                    drilldown: 'Area básica de ingeniería'
                },
                {
                    name: 'Area de ingenieria aplicada',
                    y: 25,
                    drilldown: 'Area de ingenieria aplicada'
                },
                {
                    name: 'Area socio Humanistica',
                    y: 37,
                    drilldown: 'Area socio Humanistica'
                },
                {
                    name: 'Area Económico Administrativa',
                    y: 37,
                    drilldown: 'Area Económico Administrativa'
                }
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

                    name: 'Componente propedeutico',
                    id: 'Componente propedeutico',
                    data: [
                        [
                            'Base de datos avanzadas',
                            7
                        ],
                        [
                            'Ecuaciones diferenciales',
                            10
                        ],
                        [
                            'Ingenieria de software',
                            22
                        ]
                    ]
                },
                {
                    name: 'Area de ciencias básicas',
                    id: 'Area de ciencias básicas',
                    data: [
                        [
                            'Fisica III',
                            4
                        ],
                        [
                            'Cálculo Integral',
                            15
                        ],
                        [
                            'Cálculo diferencial',
                            23
                        ],
                        
                        [
                            'Fisica Newtoniana',
                            4
                        ],
                        [
                            'Cálculo multivariado',
                            4
                        ],
                        [
                            'Algebra lineal',
                            22
                        ],
                        [
                            'Analisis y métodos númericos',
                            8
                        ],
                        [
                            'Lógica matemática',
                            10
                        ],
                        [
                            'Fisica II',
                            3
                        ]
                    ]
                },
                {

                name: 'Area básica de ingeniería',
                id: 'Area básica de ingeniería',
                data: [
                    [
                        'Diseño lógico',
                        9
                    ],
                    [
                        'Estructura de Datos',
                        7
                    ],
                    [
                        'Fundamentos de telemática',
                        3
                    ],
                    [
                        'Introducción a algoritmos',
                        6
                    ]        
                ]
                },
                {

                    name: 'Area de ingenieria aplicada',
                    id: 'Area de ingenieria aplicada',
                    data: [
                        [
                            'Computación cuántica',
                            2
                        ],
                        [
                            'Arquitectura de datos',
                            4
                        ],
                        [
                            'Analisis de sistemas',
                            15
                        ],
                        [
                            'Inteligencia artificial',
                            6
                        ],
                        [
                            'Programación avanzada',
                            11
                        ],
                        [
                            'Redes corporativas',
                            8
                        ],
                        [
                            'Sistemas distribuidos',
                            4
                        ],
                        [
                            'Redes de alta velocidad',
                            4
                        ],
                        [
                            'Bases de datos',
                            10
                        ],
                        [
                            'Teoría de la información',
                            9
                        ],
                        [
                            'Aplicaciones para internet',
                            5
                        ],
                        [
                            'Programación orientada a objetos',
                            13
                        ],
                        [
                            'Analisis de datos',
                            5
                        ],
                        [
                            'Gerencia y auditoria de redes',
                            6
                        ],
                        [
                            'Planificación y diseño de redes',
                            10
                        ],
                        [
                            'Programación multinivel',
                            10
                        ]

                    ]
                },                {

                    name: 'Area socio Humanistica',
                    id: 'Area socio Humanistica',
                    data: [
                        [
                            'Análisis social Colombiano',
                            1
                        ],
                        [
                            'Producción y comprensión de textos I',
                            2
                        ],
                        [
                            'Informatica y sociedad',
                            1
                        ],
                        [
                            'Tecnociencias',
                            2
                        ],
                        [
                            'Ética y sociedad',
                            1
                        ],
                        [
                            'Globalización',
                            1
                        ]
                    ]
                },
                {

                        name: 'Area Económico Administrativa',
                        id: 'Area Económico Administrativa',
                        data: [
                           [
                               'Tics en las organizaciones',
                               3
                           ],
                           [
                               'Fundamentos de organización',
                               1
                           ],
                           [
                               'Fundamentos de contabilidad general',
                               8
                           ],
                           [
                               'Formulación y evaluación de proyectos',
                               4
                           ],
                           [
                               'Ingenieria económica',
                               3
                           ],
                           [
                               'Fundamentos de economía',
                               7
                           ],
                           [
                               'Administración general',
                               7
                           ],
                           [
                               'Gestión de calidad',
                               4
                           ]
]
},
            ]
        }
    });
</script>
</body>

</html>