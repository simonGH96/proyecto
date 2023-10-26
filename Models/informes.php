<?php
require_once('../Config/Config.php'); // Ajusta la ruta a db.php según la ubicación real en tu proyecto.
// Resto del código de index.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleInformes.css">
    <title>Gráficas</title>
</head>

<div class="row justify-content-center" id="general-title">
        <div class="col-11">
            <h3><Hola></h3>
        </div>
    </div>
<body>
    <div class="container">
        <h1>Gráficas</h1>
        <div class="chart-container">
            <canvas id="chart1"></canvas>
            <button onclick="updateChart(1)">Actualizar Gráfica 1</button>
        </div>
        <div class="chart-container">
            <canvas id="chart2"></canvas>
            <button onclick="updateChart(2)">Actualizar Gráfica 2</button>
        </div>
        <div class="chart-container">
            <canvas id="chart3"></canvas>
            <button onclick="updateChart(3)">Actualizar Gráfica 3</button>
        </div>
    </div>
    <script src="js/Chart.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
