<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $planDeTrabajo = $_POST["plan_de_trabajo"];
    $asignatura = $_POST["asignatura"];
    $estudiante = $_POST["estudiante"];

    // Procesar la subida de documentos
    if ($_FILES["documento"]["error"] === UPLOAD_ERR_OK) {
        $documentoNombre = $_FILES["documento"]["name"];
        $documentoTipo = $_FILES["documento"]["type"];
        $documentoTamaño = $_FILES["documento"]["size"];
        $documentoUbicación = "../Data/" . $documentoNombre; // Directorio donde se almacenará el documento

        // Mover el archivo al directorio de destino
        if (move_uploaded_file($_FILES["documento"]["tmp_name"], $documentoUbicación)) {
            // Aquí puedes realizar cualquier otra operación con los datos, como guardarlos en una base de datos
            // Por ejemplo, puedes insertar esta información en una tabla de la base de datos

            // Redireccionar de nuevo al formulario o a otra página después de procesar
            header("Location: planes_de_trabajo.php");
            exit;
        } else {
            echo "Error al subir el archivo.";
        }
    } else {
        echo "Error al subir el archivo.";
    }
} else {
    echo "Acceso no autorizado.";
}
?>
