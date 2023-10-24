<?php pageHeader($data);?>
    <div class="row justify-content-center" id="general-title">
        <div class="col-11">
            <h3><?= $data['page_title'];?></h3>
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

<script src="https://code.highcharts.com/modules/venn.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>


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
    accessibility: {
        point: {
            descriptionFormatter: function (point) {
                var intersection = point.sets.join(', '),
                    name = point.name,
                    ix = point.index + 1,
                    val = point.value;
                return ix + '. Intersection: ' + intersection + '. ' +
                    (point.sets.length > 1 ? name + '. ' : '') + 'Value ' + val + '.';
            }
        }
    },
    series: [{
        type: 'venn',
        name: 'Componente Propedéutico, Area Básica de Ingeniería y Area de Ingeniería Aplicada',
        data: [{
            sets: ['Componente Propedéutico'],
            value: 2
        }, {
            sets: ['Area Básica de Ingeniería'],
            value: 2
        }, {
            sets: ['Area de Ingeniería Aplicada'],
            value: 2
        }, {
            sets: ['Componente Propedéutico', 'Area Básica de Ingeniería'],
            value: 1,
            name: ' '
        }, {
            sets: ['Componente Propedéutico', 'Area de Ingeniería Aplicada'],
            value: 1,
            name: '1 Aplicación StandAlone<br>2Red Implementada<br>3 API'
        }, {
            sets: ['Area Básica de Ingeniería', 'Area de Ingeniería Aplicada'],
            value: 1,
            name: 'Algoritmo Inédito<br>Juego<br>Red Implementada<br>API'
        }, {
            sets: ['Area Básica de Ingeniería', 'Area de Ingeniería Aplicada', 'Componente Propedéutico'],
            value: 1,
            name: '1 Análisis de un sistema<br>2 Diseño de un Sistema<br>3 Modelado Matemático<br>4 Documento Técnico<br>5 Ecuación Planteada<br>6 Ecuación Interpretada<br>7 Modelo lógico de Datos<br>8 Programa Inédito<br>9 Diseño de Red<br>10 Backend<br>11 Anteproyecto<br>12 Simulación'
        }]
    }],
    title: {
        text: 'Observe la intersección entre Componente Propedéutico, Area Básica de Ingeniería y Area de Ingeniería Aplicada'
    }
});
</script>