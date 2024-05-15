<?php
require_once '../Views/header.php';
require_once '../Config/Config.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Formulario de Subida de Documentos</title>
    <link rel="stylesheet" type="text/css" href="../estilo_agregar_estudiante.css">
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

                        $sql = "SELECT codigo FROM estudiante ";
                        $resultado = mysqli_query($conn, $sql);
                        ?>

                        <form action="procesar_formulario.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="plan_de_trabajo">Ingresar Plan de Trabajo:</label>
                                <textarea id="plan_de_trabajo" name="plan_de_trabajo" rows="4" cols="50"
                                    required></textarea>
                            </div>


                            <?php
        $sql = "SELECT asignatura FROM asignatura_planes";
        $result = $conn->query($sql);

// Comprobar si se encontraron filas
if ($result->num_rows > 0) {
    // Crear la etiqueta select
    echo '<label for="asignatura_FK">Asignatura:</label>';
    echo '<select id="asignatura_FK" name="asignatura_FK">';
    
    // Mostrar opciones en un bucle while
    while($row = $result->fetch_assoc()) {
        echo '<option value="' . $row["asignatura"] . '">' . $row["asignatura"] . '</option>';
    }
    
    echo '</select>';
} else {
    echo "No se encontraron resultados en la tabla.";
}

?>

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
                            mysqli_close($conn);
                            ?>

                            <div class="form-group">
                                <label for="documento">Subir Documento:</label>
                                <input type="file" id="documento" name="documento" class="btn">
                            </div>

                            <div class="form-group">
                                <input class="btn btn-warning" type="submit" value="Subir Documento">
                            </div>
                        </form>
                    </tbody>

                </div>
            </div>
            <a href="../Models/planes_de_trabajo.php" class="btn btn-warning">Volver</a>
        </div>

</body>

</html>