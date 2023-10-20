<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Formulario de Subida de Documentos</title>
    <link rel="stylesheet" type="text/css" href="formato.css">
</head>
<body>
    <header>
        <h1>Formulario de Subida de Documentos</h1>
    </header>
    
    <main>
    <?php
// Establecer la conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "proyecto_consejerias");

if (!$conexion) {
    die("La conexión a la base de datos ha fallado: " . mysqli_connect_error());
}

// Consulta SQL para obtener los datos del estudiante
$sql = "SELECT codigo FROM estudiante ";
$resultado = mysqli_query($conexion, $sql);
?>

<form action="procesar_formulario.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="plan_de_trabajo">Ingresar Plan de Trabajo:</label>
        <textarea id="plan_de_trabajo" name="plan_de_trabajo" rows="4" cols="50" required></textarea>
    </div>

    <div class="form-group">
        <label for="asignatura">Asignatura:</label>
        <input type="text" id="asignatura" name="asignatura" required>
    </div>

    <div class="form-group">
        <label for="estudiante">Estudiante:</label>
        <select id="estudiante" name="estudiante" required>
            <?php
            if (mysqli_num_rows($resultado) > 0) {
                while ($fila = mysqli_fetch_assoc($resultado)) {
                    echo "<option value='" . $fila["codigo"] . "'>" . $fila["codigo"] . "</option>";
                }
            } else {
                echo "<option value=''>No se encontraron estudiantes</option>";
            }
            ?>
        </select>
    </div>

    <?php
    mysqli_close($conexion);
    ?>

    <div class="form-group">
        <label for="documento">Subir Documento:</label>
        <input type="file" id="documento" name="documento" required>
    </div>

    <div class="form-group">
        <input type="submit" value="Subir Documento">
    </div>
</form>

<a href="inicio/home.php">
    <button id="home-button">Volver al Inicio</button>
</a>

    </main>

    <footer>
        <p>Pie de Página - © 2023 Formulario de Subida de Documentos</p>
    </footer>
</body>
</html>
