<?php

require_once('../Config/Config.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $planDeTrabajo = $_POST["plan_de_trabajo"];
    $asignatura = $_POST["asignatura_FK"];
    $codigoFK = $_POST["estudiante"];
    
    // Obtener el id_asignatura correspondiente a la asignatura ingresada
    $id_asignatura = null;
    $stmt_asignatura = $conn->prepare("SELECT id_asignatura FROM asignatura_planes WHERE asignatura = ?");
    $stmt_asignatura->bind_param("s", $asignatura);
    $stmt_asignatura->execute();
    $result_asignatura = $stmt_asignatura->get_result();
    if ($result_asignatura->num_rows > 0) {
        $row = $result_asignatura->fetch_assoc();
        $id_asignatura = $row["id_asignatura"];
    }
    $stmt_asignatura->close();
    
    // Procesar la subida de documentos
    if ($_FILES["documento"]["error"] === UPLOAD_ERR_OK) {
        $documentoNombre = $_FILES["documento"]["name"];
        $documentoUbicación = "../Data/" . $documentoNombre; // Directorio donde se almacenará el documento

        // Mover el archivo al directorio de destino
        if (move_uploaded_file($_FILES["documento"]["tmp_name"], $documentoUbicación)) {
            $sql = "INSERT INTO planes (escribir_plan, asignatura_FK, documento, estudiante_FK) VALUES (?, ?, ?, ?)";

            // Prepara la sentencia SQL
            $stmt = $conn->prepare($sql);

            if ($stmt) {
                // Asocia los parámetros con los valores del formulario
                $stmt->bind_param("sssi", $planDeTrabajo, $id_asignatura, $documentoNombre, $codigoFK);
                
                // Ejecuta la consulta SQL para insertar el registro en la base de datos
                if ($stmt->execute()) {
                    echo '<script>alert("Formulario guardado exitosamente.");</script>';
                    echo '<script>window.location.href = "../Models/planes_de_trabajo.php";</script>';
                    exit; // Terminate the script after redirection
                } else {
                    echo "Error al agregar el estudiante: " . $stmt->error;
                }

                // Cierra la sentencia SQL
                $stmt->close();
            } else {
                echo "Error en la preparación de la sentencia SQL: " . $conn->error;
            }
        } else {
            echo "Error al subir el archivo.";
        }
    } else {
        // Manejo de errores al subir el archivo
        switch ($_FILES["documento"]["error"]) {
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                echo "El archivo subido excede el tamaño máximo permitido.";
                break;
            case UPLOAD_ERR_PARTIAL:
                echo "El archivo se subió parcialmente.";
                break;
            case UPLOAD_ERR_NO_FILE:
                echo "No se subió ningún archivo.";
                break;
            case UPLOAD_ERR_NO_TMP_DIR:
                echo "Falta la carpeta temporal.";
                break;
            case UPLOAD_ERR_CANT_WRITE:
                echo "No se pudo escribir el archivo en el disco.";
                break;
            case UPLOAD_ERR_EXTENSION:
                echo "Una extensión PHP detuvo la subida del archivo.";
                break;
            default:
                echo "Error desconocido al subir el archivo.";
                break;
        }
    }
} else {
    echo "Acceso no autorizado.";
}

// Cierra la conexión a la base de datos
$conn->close();

?>
