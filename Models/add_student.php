<?php
require_once '../Views/header.php';
require_once '../Config/Config.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Agregar Estudiante</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="../estilo_agregar_estudiante.css">
</head>
<body>
    
            <div class="text-center">
                <h3 class="mt-1 mb-3 pb-1">Agregar nuevo estudiante</h3>
            </div>
    <form action="agregar_estudiante.php" method="post" class="student-form">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="codigo">Código:</label>
        <input type="text" id="codigo" name="codigo" pattern="[0-9]{10,}" title="Por favor, ingrese al menos 10 números" required>


        <label for="es_cabeza_familia">Es Cabeza de Familia:</label>
        <select id="es_cabeza_familia" name="es_cabeza_familia">
            <option value="si">Sí</option>
            <option value="no">No</option>
        </select>

        <label for="composicion_familiar">Composición Familiar:</label>
        <textarea id="composicion_familiar" name="composicion_familiar"></textarea>

        <?php
        $sql = "SELECT ciudad FROM ciudad_estudiante";
        $result = $conn->query($sql);

// Comprobar si se encontraron filas
if ($result->num_rows > 0) {
    // Crear la etiqueta select
    echo '<label for="ciudad_FK">Lugar de Procedencia:</label>';
    echo '<select id="ciudad_FK" name="ciudad_FK">';
    
    // Mostrar opciones en un bucle while
    while($row = $result->fetch_assoc()) {
        echo '<option value="' . $row["ciudad"] . '">' . $row["ciudad"] . '</option>';
    }
    
    echo '</select>';
} else {
    echo "No se encontraron resultados en la tabla.";
}

// Cerrar la conexión
$conn->close();
?>

        <label for="personas_con_quien_vive">Personas con Quien Vive:</label>
        <input min=0 type="number" id="personas_con_quien_vive" name="personas_con_quien_vive">


        <label for="actividades_trabajo">Actividades de Trabajo:</label>
        <input type="text" id="actividades_trabajo" name="actividades_trabajo">

        <label for="actividades_interes">Actividades de Interés:</label>
        <input type="text" id="actividades_interes" name="actividades_interes">

        <label for="solicitudes_retiro_reintegro">Solicitudes de Retiro o Reintegro:</label>
        <input min=0 type=number id="solicitudes_retiro_reintegro" name="solicitudes_retiro_reintegro"></input>

        <label for="adaptacion_universidad">Adaptación a la Universidad:</label>
        <textarea id="adaptacion_universidad" name="adaptacion_universidad"></textarea>

        <label for="intereses_academicos">Intereses Académicos:</label>
        <input type="text" id="intereses_academicos" name="intereses_academicos">

        <label for="grupos_vincula">Grupos a los que se Vincula:</label>
        <input type="text" id="grupos_vincula" name="grupos_vincula">

        <label for="movilidad_estudiantil">Movilidad Estudiantil:</label>
        <select id="movilidad_estudiantil" name="movilidad_estudiantil">
            <option>Caminando</option>
            <option>Transmilenio</option>
            <option>Carro</option>
            <option>Moto</option>
            <option>Otro</option>
        </select>


        <label for="prueba_academica">Situaciones de Prueba Académica:</label>
        <input type="text" id="prueba_academica" name="prueba_academica">

        <label for="recomendaciones_consejero">Recomendaciones del Consejero:</label>
        <textarea id="recomendaciones_consejero" name="recomendaciones_consejero"></textarea>
        
        <label for="semestres_transcurridos">Semestres en la universidad:</label>
        <input min=1 type="number" id="semestres_transcurridos" name="semestres_transcurridos">
        <br><br>
        <button type="submit" class="btn btn-warning">Agregar Estudiante</button>
        <button type="button" class="btn btn-warning" onclick="window.location.href='../Views/estudiantes.php'">Volver</button>
    </form>

   
</body>
</html>
