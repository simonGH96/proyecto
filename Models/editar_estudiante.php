<?php
// Establecer la conexión a la base de datos
$servername = "localhost";
$username_db = "root";
$password_db = "";
$database = "proyecto_consejerias";

$conn = new mysqli($servername, $username_db, $password_db, $database);

if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

$estudiante_codigo = '';

if (isset($_GET['codigo']) ) {
    $estudiante_codigo = $_GET['codigo'];

    // Consulta SQL para obtener la información del estudiante según el código
    $sql = "SELECT * FROM estudiante WHERE codigo = ?";

    // Preparar la sentencia SQL
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("s", $estudiante_codigo);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            $estudiante = $resultado->fetch_assoc();
        } else {
            echo "Estudiante no encontrado.";
            exit();
        }        

        $stmt->close();
    } else {
        echo "Error en la preparación de la sentencia SQL: " . $conn->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nuevo_codigo = $_POST["codigo"];
    $nuevo_nombre = $_POST["nombre"];
    $nuevo_es_cabeza_familia = $_POST["es_cabeza_familia"];
    $nueva_composicion_familiar = $_POST["composicion_familiar"]; 
    $nuevo_lugar_procedencia = $_POST["lugar_procedencia"];
    $nuevo_personas_con_quien_vive = $_POST["personas_con_quien_vive"];
    $nuevo_actividades_trabajo = $_POST["actividades_trabajo"];
    $nuevo_actividades_interes = $_POST["actividades_interes"];
    $nuevo_solicitudes_retiro_reintegro = $_POST["solicitudes_retiro_reintegro"];
    $nuevo_adaptacion_universidad = $_POST["adaptacion_universidad"];
    $nuevo_intereses_academicos = $_POST["intereses_academicos"];
    $nuevo_grupos_vincula = $_POST["grupos_vincula"];
    $nuevo_movilidad_estudiantil = $_POST["movilidad_estudiantil"];
    $nuevo_prueba_academica = $_POST["prueba_academica"];
    $nuevo_recomendaciones_consejero = $_POST["recomendaciones_consejero"];

    // Consulta de actualización
    $sql_update = "UPDATE estudiante SET codigo = ?, nombre = ?,cabeza = ?, familia = ?, procedencia = ?, personas_vive = ?, trabajo = ?, interes = ?, solicitudes = ?, adaptacion = ?, intereses_aca = ?, grupos = ?, movilidad = ?, prueba_aca = ?, recomendaciones = ? WHERE codigo = ?";

    $stmt_update = $conn->prepare($sql_update);

    if ($stmt_update) {
        $stmt_update->bind_param("ssssssssssssssss", $nuevo_codigo, $nuevo_nombre, $nuevo_es_cabeza_familia, $nueva_composicion_familiar, $nuevo_lugar_procedencia, $nuevo_personas_con_quien_vive, $nuevo_actividades_trabajo, $nuevo_actividades_interes, $nuevo_solicitudes_retiro_reintegro, $nuevo_adaptacion_universidad, $nuevo_intereses_academicos, $nuevo_grupos_vincula, $nuevo_movilidad_estudiantil, $nuevo_prueba_academica, $nuevo_recomendaciones_consejero, $estudiante_codigo);

        if ($stmt_update->execute()) {
            // Actualización exitosa, redirigir a la página de estudiantes
            header("Location: estudiantes.php");
            exit();
        } else {
            echo "Error al actualizar el estudiante: " . $stmt_update->error;
        }
        $stmt_update->close();
    } else {
        echo "Error en la preparación de la sentencia SQL de actualización: " . $conn->error;
    }
}


$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Editar Estudiante</title>
    <link rel="stylesheet" type="text/css" href="../estilo_agregar_estudiante.css">
</head>
<body>
    <h1>Editar Estudiante</h1>

    <form action="editar_estudiante.php?codigo=<?php echo $estudiante_codigo; ?>" method="post" class="student-form">
    <label for="codigo">Código:</label>
    <input type="text" id="codigo" name="codigo" value="<?php echo $estudiante['codigo']; ?>" required>

    <label for="nombre">Nombre:</label>
    <input type = "text" id="nombre" name="nombre" value="<?php echo $estudiante['nombre']; ?>" required>

    <label for="es_cabeza_familia">¿Es cabeza de familia?</label>
    <input type="checkbox" id="es_cabeza_familia" name="es_cabeza_familia" <?php echo ($estudiante['cabeza'] == 'Si') ? 'checked' : ''; ?>>

    <label for="composicion_familiar">Composición Familiar:</label>
    <textarea id="composicion_familiar" name="composicion_familiar" required><?php echo $estudiante['familia']; ?></textarea>

    <label for="lugar_procedencia">Lugar de Procedencia:</label>
<input type="text" id="lugar_procedencia" name="lugar_procedencia" value="<?php echo $estudiante['procedencia']; ?>" required>

<label for="personas_con_quien_vive">Personas con quien vive:</label>
<input type="text" id="personas_con_quien_vive" name="personas_con_quien_vive" value="<?php echo $estudiante['personas_vive']; ?>" required>

<label for="actividades_trabajo">Actividades de trabajo:</label>
<input type="text" id="actividades_trabajo" name="actividades_trabajo" value="<?php echo $estudiante['trabajo']; ?>" required>

<label for="actividades_interes">Actividades de interés:</label>
<input type="text" id="actividades_interes" name="actividades_interes" value="<?php echo $estudiante['interes']; ?>" required>

<label for="solicitudes_retiro_reintegro">Solicitudes de retiro/reintegro:</label>
<input type="text" id="solicitudes_retiro_reintegro" name="solicitudes_retiro_reintegro" value="<?php echo $estudiante['solicitudes']; ?>" required>

<label for="adaptacion_universidad">Adaptación a la universidad:</label>
<input type="text" id="adaptacion_universidad" name="adaptacion_universidad" value="<?php echo $estudiante['adaptacion']; ?>" required>

<label for="intereses_academicos">Intereses académicos:</label>
<input type="text" id="intereses_academicos" name="intereses_academicos" value="<?php echo $estudiante['intereses_aca']; ?>" required>

<label for="grupos_vincula">Grupos a los que se vincula:</label>
<input type="text" id="grupos_vincula" name="grupos_vincula" value="<?php echo $estudiante['grupos']; ?>" required>

<label for="movilidad_estudiantil">Movilidad estudiantil:</label>
<input type="text" id="movilidad_estudiantil" name="movilidad_estudiantil" value="<?php echo $estudiante['movilidad']; ?>" required>

<label for="prueba_academica">Prueba académica:</label>
<input type="text" id="prueba_academica" name="prueba_academica" value="<?php echo $estudiante['prueba_aca']; ?>" required>

<label for="recomendaciones_consejero">Recomendaciones del consejero:</label>
<textarea id="recomendaciones_consejero" name="recomendaciones_consejero" required><?php echo $estudiante['recomendaciones']; ?></textarea>

    <button type="submit">Guardar Cambios</button>
    <button type="button" class="return-button" onclick="window.location.href='../Views/estudiantes.php'">Volver</button>
</form>

</body>
</html>
