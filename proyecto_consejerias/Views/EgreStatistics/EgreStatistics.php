<?php pageHeader($data);?>
    <div class="row justify-content-center" id="general-title">
        <div class="col-11">
            <h3><?= $data['page_title'];?></h3>
        </div>
    </div>
    <div class="row justify-content-center" id="widgets-sts">
        <div class="col-11">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-secondary shadow">
                        <div class="inner">
                            <h3><?= $data['amount_learning_result'];?></h3>
                            <p>Resultados de aprendizaje</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-solid fa-graduation-cap fa-3x"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success shadow">
                        <div class="inner">
                            <h3><?= $data['amount_subject'];?></h3>
                            <p>Espacios académicos</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-solid fa-brain fa-3x"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger shadow">
                        <div class="inner">
                            <h3><?= $data['amount_teacher'];?></h3>
                            <p>Docentes</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-solid fa-person-chalkboard fa-3x"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning shadow">
                        <div class="inner">
                            <h3><?= $data['amount_assign_learning_result'];?></h3>
                            <p>Asignaciones</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-solid fa-arrow-right-arrow-left fa-3x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-11">

            <div class="row" id="charts">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div id="laboral"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php footer($data);?>

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

<script>
    Highcharts.setOptions({
        colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
            return {
                radialGradient: {
                    cx: 0.5,
                    cy: 0.3,
                    r: 0.7
                },
                stops: [
                    [0, color],
                    [1, Highcharts.color(color).brighten(-0.3).get('rgb')] 
                ]
            };
        })
    });
</script>


<script>
    Highcharts.chart('laboral', {
    series: [{
        type: "treemap",
        layoutAlgorithm: 'stripes',
        alternateStartingDirection: true,
        levels: [{
            level: 1,
            layoutAlgorithm: 'sliceAndDice',
            dataLabels: {
                enabled: true,
                align: 'left',
                verticalAlign: 'top',
                style: {
                    fontSize: '15px',
                    fontWeight: 'bold'
                }
            }
        }],
        data: [{
            id: 'A',
            name: 'Técnico',
            color: "#B71C1C"
        }, {
            id: 'B',
            name: 'Administrativo',
            color: '#EB7D16'
        }, {
            id: 'C',
            name: 'Telemático',
            color: "#0F2F76"
        }, {
            id: 'D',
            name: 'Otros',
            color: '#E7ECEF'
        }, {
            name: 'Desarrollador de software',
            parent: 'A',
            value: 190
        }, {
            name: 'Consultorias',
            parent: 'B',
            value: 31
        }, {
            name: 'Gestión de proyectos',
            parent: 'B',
            value: 9
        }, {
            name: 'Analista',
            parent: 'B',
            value: 24
        }, {
            name: 'Infraestructura',
            parent: 'C',
            value: 28
        }, {
            name: 'Ingeniero de software',
            parent: 'B',
            value: 44
        }, {
            name: 'Planeación',
            parent: 'B',
            value: 24
        }, {
            name: 'CEO',
            parent: 'B',
            value: 2
        },
        {
            name: 'Servicio al cliente',
            parent: 'B',
            value: 19
        },{
            name: 'Marketing',
            parent: 'B',
            value: 55
        },{
            name: 'Gestor de tecnologías',
            parent: 'B',
            value: 4
        },
        {
            name: 'Inteligencia de negocios',
            parent: 'B',
            value: 106
        },
        {
            name: 'Arquitecto blockchain',
            parent: 'B',
            value: 1
        },
        {
            name: 'Lider de desarrollo',
            parent: 'B',
            value: 13
        },
        {
            name: 'DevOps',
            parent: 'C',
            value: 73
        },
        {
            name: 'Sistemas distribuidos',
            parent: 'C',
            value: 1
        },
        {
            name: 'Ingeniero IoT',
            parent: 'C',
            value: 2
        },
        {
            name: 'Diseñador gráfico',
            parent: 'D',
            value: 6
        },
        {
            name: 'Docencia',
            parent: 'D',
            value: 12
        },
        {
            name: 'Estimador de costos',
            parent: 'D',
            value: 1
        },
        {
            name: 'Bases de datos',
            parent: 'A',
            value: 43
        },
        {
            name: 'Ingeniero de integración',
            parent: 'A',
            value: 7
        },
        {
            name: 'Soporte',
            parent: 'A',
            value: 31
        },
        {
            name: 'QA, Testing',
            parent: 'A',
            value: 63
        },
        {
            name: 'Seguimiento de software',
            parent: 'A',
            value: 11
        }]
    }],
    title: {
        text: 'Egresados según areá de trabajo'
    },
    subtitle: {
        text:
            'Source: <a href="https://snl.no/Norge" target="_blank">SNL</a>'
    },
    tooltip: {
        useHTML: true,
        pointFormat:
            "La categoria <b>{point.name}</b> tiene <b>{point.value} egresados </b>"
    }
});


</script>