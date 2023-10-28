<?php
require '../Views/header.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Formulario de Subida de Documentos</title>
    <link rel="stylesheet" type="text/css" href="formato.css">
</head>

<body>
    <div class="row justify-content-center" id="card-content-page">
        <div class="col-10">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h3>Subir un nuevo plan de trabajo</h3>
                </div>
                <div class="card-body row justify-content-center" id="card-body-page">
                    <tbody>
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
                                <textarea id="plan_de_trabajo" name="plan_de_trabajo" rows="4" cols="50"
                                    required></textarea>
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
                    </tbody>

                </div>
            </div>
            <a href="planes_de_trabajo.php" class="btn btn-warning">Volver</a>
        </div>





</body>

</html>