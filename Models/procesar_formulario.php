<?php

require_once('../Config/Config.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $planDeTrabajo = $_POST["plan_de_trabajo"];
    $asignatura = $_POST["asignatura"];
    $codigoFK = $_POST["estudiante"];
    
    // Procesar la subida de documentos
    if ($_FILES["documento"]["error"] === UPLOAD_ERR_OK) {
        $documentoNombre = $_FILES["documento"]["name"];
        $documentoTipo = $_FILES["documento"]["type"];
        $documentoTamaño = $_FILES["documento"]["size"];
        $documentoUbicación = "../Data/" . $documentoNombre; // Directorio donde se almacenará el documento

        // Mover el archivo al directorio de destino
        if (move_uploaded_file($_FILES["documento"]["tmp_name"], $documentoUbicación)) {
            $sql = "INSERT INTO planes (escribir_plan, asignatura, documento, codigo_FK) VALUES (?, ?, ?,?)";

        // Prepara la sentencia SQL
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            // Asocia los parámetros con los valores del formulario
            $stmt->bind_param("sssi", $planDeTrabajo, $asignatura, $documentoNombre, $codigoFK);
            
            // Ejecuta la consulta SQL para insertar el registro en la base de datos
        if ($stmt->execute()) {
        echo '<script>alert("Formulario guardado exitosamente.");</script>';
        echo '<script>window.location.href = "../Models/planes_de_trabajo.php";</script>'; 
        } else {
        echo "Error al agregar el estudiante: " . $stmt->error;
        }

        // Cierra la sentencia SQL
        $stmt->close();
        } else {
         echo "Error en la preparación de la sentencia SQL: " . $conn->error;
        }

            header("Location: planes_de_trabajo.php");
            exit;
        } else {
            echo "Error al subir el archivo.";
        }
    } else {
        echo "Error al subir el archivo blablabla.";
    }
} else {
    echo "Acceso no autorizado.";
}
// Cierra la conexión a la base de datos
$conn->close();
?>


 