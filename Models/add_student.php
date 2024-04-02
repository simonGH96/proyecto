<?php
require '../Views/header.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Agregar Estudiante</title>
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
        <input type="text" id="codigo" name="codigo" required>

        <label for="es_cabeza_familia">Es Cabeza de Familia:</label>
        <select id="es_cabeza_familia" name="es_cabeza_familia">
            <option value="si">Sí</option>
            <option value="no">No</option>
        </select>

        <label for="composicion_familiar">Composición Familiar:</label>
        <textarea id="composicion_familiar" name="composicion_familiar"></textarea>

        <label for="lugar_procedencia">Lugar de Procedencia:</label>
        <input type="text" id="lugar_procedencia" name="lugar_procedencia">

        <label for="personas_con_quien_vive">Personas con Quien Vive:</label>
        <input type="text" id="personas_con_quien_vive" name="personas_con_quien_vive">

        <label for="actividades_trabajo">Actividades de Trabajo:</label>
        <input type="text" id="actividades_trabajo" name="actividades_trabajo">

        <label for="actividades_interes">Actividades de Interés:</label>
        <input type="text" id="actividades_interes" name="actividades_interes">

        <label for="solicitudes_retiro_reintegro">Solicitudes de Retiro o Reintegro:</label>
        <textarea id="solicitudes_retiro_reintegro" name="solicitudes_retiro_reintegro"></textarea>

        <label for="adaptacion_universidad">Adaptación a la Universidad:</label>
        <textarea id="adaptacion_universidad" name="adaptacion_universidad"></textarea>

        <label for="intereses_academicos">Intereses Académicos:</label>
        <input type="text" id="intereses_academicos" name="intereses_academicos">

        <label for="grupos_vincula">Grupos a los que se Vincula:</label>
        <input type="text" id="grupos_vincula" name="grupos_vincula">

        <label for="movilidad_estudiantil">Movilidad Estudiantil:</label>
        <input type="text" id="movilidad_estudiantil" name="movilidad_estudiantil">

        <label for="prueba_academica">Situaciones de Prueba Académica:</label>
        <input type="text" id="prueba_academica" name="prueba_academica">

        <label for="recomendaciones_consejero">Recomendaciones del Consejero:</label>
        <textarea id="recomendaciones_consejero" name="recomendaciones_consejero"></textarea>

        <button type="submit" class="btn btn-warning">Agregar Estudiante</button>
        <button type="button" class="btn btn-warning" onclick="window.location.href='../Views/estudiantes.php'">Volver</button>
        
    </form>

    
</body>
</html>