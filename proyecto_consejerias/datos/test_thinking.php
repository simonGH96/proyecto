<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Estadísticas</title>
    <link rel="stylesheet" type="text/css" href="http://www.sistematizaciondatos.com.dream.website/resultados/laura/Assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/@jarstone/dselect/dist/css/dselect.css">
</head>
<body class="d-flex flex-column min-vh-100">
    
    <content>
        <div class="row justify-content-center" id="general-title">
        <div class="col-11">
            <h3>Tratamiento estadístico</h3>
        </div>
    </div>


    <div class="row justify-content-center">
        <div class="col-11">

            <div class="row" id="charts">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div id="MI_grafica"></div>
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
                            <div id="PAQUETE"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</content>





    <footer class="mt-auto align-items-center">
            <p class="text-center text-muted">Universidad Distrital Francisco José de Caldas © 2022</p>
    </footer>
    <script>const base_url = "http://www.sistematizaciondatos.com.dream.website/resultados/laura/"</script>
    <script src="http://www.sistematizaciondatos.com.dream.website/resultados/laura/Assets/js/fontawesome.js"></script>
    <script src="http://www.sistematizaciondatos.com.dream.website/resultados/laura/Assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="http://www.sistematizaciondatos.com.dream.website/resultados/laura/Assets/js/plugins/sweetalert.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://unpkg.com/@jarstone/dselect/dist/js/dselect.js"></script> 
    <script src="http://www.sistematizaciondatos.com.dream.website/resultados/laura/Assets/js/functions_stats.js"></script>
</body>
</html>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>














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
// A point click event that uses the Renderer to draw a label next to the point
// On subsequent clicks, move the existing label instead of creating a new one.
Highcharts.addEvent(Highcharts.Point, 'click', function () {
    if (this.series.options.className.indexOf('popup-on-click') !== -1) {
        const chart = this.series.chart;
        const date = Highcharts.dateFormat('%A, %b %e, %Y', this.x);
        const text = `<b>${date}</b><br/>${this.y} ${this.series.name}`;

        const anchorX = this.plotX + this.series.xAxis.pos;
        const anchorY = this.plotY + this.series.yAxis.pos;
        const align = anchorX < chart.chartWidth - 200 ? 'left' : 'right';
        const x = align === 'left' ? anchorX + 10 : anchorX - 10;
        const y = anchorY - 30;
        if (!chart.sticky) {
            chart.sticky = chart.renderer
                .label(text, x, y, 'callout',  anchorX, anchorY)
                .attr({
                    align,
                    fill: 'rgba(0, 0, 0, 0.75)',
                    padding: 10,
                    zIndex: 7 // Above series, below tooltip
                })
                .css({
                    color: 'white'
                })
                .on('click', function () {
                    chart.sticky = chart.sticky.destroy();
                })
                .add();
        } else {
            chart.sticky
                .attr({ align, text })
                .animate({ anchorX, anchorY, x, y }, { duration: 250 });
        }
    }
});

Highcharts.chart('MI_grafica', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Espacios por Pensamiento'
    },
    
    xAxis:{

        categories:[
            'Cantidad'
        ]
    },
    
    yAxis: {
        title: {
            useHTML: true,
            text: 'Cantidad de espacios'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
     
    legend:{ enabled:false },

    data: {
        csvURL: 'http://www.sistematizaciondatos.com.dream.website/resultados/res-aprendizaje6/datos/datos_thinking.csv',
        beforeParse: function (csv) {
            return csv.replace(/\n\n/g, '\n');
        }
    },
});

Highcharts.chart('PAQUETE', {
	chart: {
	type: 'packedbubble',
	height: '100%'
},

title: {
	text: 'Espacios por Pensamiento'
},


tooltip: {
	useHTML: true,
	
	
    pointFormat: '<b>{point.name}</b> Cantidad de espacios: {point.value}'
	
},
data: {
        csvURL: 'http://www.sistematizaciondatos.com.dream.website/resultados/res-aprendizaje6/datos/datos_thinking.csv',
        beforeParse: function (csv) {
            return csv.replace(/\n\n/g, '\n');
        }
        
    },
plotOptions: {
	packedbubble: {
		minSize: '25%',
		maxSize: '100%',
		zMin: 0,
		zMax: 100,
layoutAlgorithm: {
	gravitationalConstant: 0.05,
	splitSeries: true,
	seriesInteraction: true,
	dragBetweenSeries: false,
	parentNodeLimit: true
},
dataLabels: {
	enabled: true,
	format: '{point.name}',
	filter: {
	property: 'y',
	operator: '>',
	value: 0
},
style: {
	color: 'black',
	textOutline: 'none',
	fontWeight: 'Black'
},


}
}
},
});


</script>


