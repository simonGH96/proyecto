<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Desempeño de Estudiantes</title>
    <link rel="stylesheet" type="text/css" href="styleInformes.css">
</head>
<body>
    <header>
        <h1>Desempeño de Estudiantes</h1>
        <a href="inicio/home.php" class="back-to-top">Volver al Inicio</a>
    </header>
    
    <main>
        <div id="filters">
            <label for="student-filter">Estudiante:</label>
            <select id="student-filter">
                <option value="estudiante1">Estudiante 1</option>
                <option value="estudiante2">Estudiante 2</option>
                <!-- Agrega más opciones de estudiantes aquí -->
            </select>

            <label for="age-filter">Edad:</label>
            <select id="age-filter">
                <option value="menos_de_20">Menos de 20</option>
                <option value="20_a_25">20 a 25</option>
                <!-- Agrega más opciones de edad aquí -->
            </select>

            <label for="teacher-filter">Profesor:</label>
            <select id="teacher-filter">
                <option value="profesor1">Profesor 1</option>
                <option value="profesor2">Profesor 2</option>
                <!-- Agrega más opciones de profesor aquí -->
            </select>
        </div>

        <div id="chart-container">
            <canvas id="performance-chart"></canvas>
        </div>
    </main>
    <footer>
        <p>Pie de Página - © 2023 Desempeño de Estudiantes</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="script.js"></script>
</body>
</html>
