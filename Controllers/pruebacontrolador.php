<?php

require '../Models/StadisticsModel.php'; // Reemplaza con la ruta correcta a tu Modelo


// Crear una instancia del modelo
$stadisticsModel = new StadisticsModel();

// Llamar a la función para obtener la cantidad de estudiantes
$cantidadEstudiantes = $stadisticsModel->obtenerCantidadEstudiantes();

// Llamar a la función para obtener la cantidad de docentes
$cantidadDocentes = $stadisticsModel->obtenerCantidadDocentes();

// Asegúrate de cerrar la conexión a la base de datos cuando hayas terminado
$stadisticsModel->cerrarConexion();

// Aquí puedes usar $cantidadEstudiantes y $cantidadDocentes en tu vista o realizar cualquier otra lógica que necesites.

?>