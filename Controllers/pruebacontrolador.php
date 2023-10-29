require 'StudentModel.php'; // Reemplaza con la ruta correcta a tu Modelo

// Crea una instancia del Modelo
$studentModel = new StudentModel();

// Llama a la función del Modelo para obtener la cantidad de estudiantes
$cantidadEstudiantes = $studentModel->obtenerCantidadEstudiantes();